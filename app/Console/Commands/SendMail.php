<?php

namespace App\Console\Commands;

use App\Models\MailSendManager;
use App\Models\MailSetting;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Mail';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        date_default_timezone_set('Asia/Tokyo');
        $this->changeBToC();
        $this->sendMessageByType('A');
        $this->sendMessageByType('B');
        $this->sendMessageByType('C');
    }

    public function changeBToC(){
        $user = User::where('role', 'user')->where('account_type', 'B')->get()->toArray();
        foreach ($user as $item){
            if($item->account_type === 'B'){
                $today = date("Y-m-d");
                $b_date = $item->b_date; //from database

                $today_time = strtotime($today);
                $b_time = strtotime($b_date);
                if ($b_time < $today_time) {
                    User::where('id', $item->id)->update([
                        'account_type' => 'C',
                        'b_date' => null
                    ]);
                }
            }
        }
    }

    public function sendMessageByType($account_type){
        $mail_manage = MailSendManager::where('type', $account_type)->get()->first();
        if ($mail_manage->send_status == 0) {
            return;
        }
        $send_start_time = $mail_manage->send_start_time;
        $time_arr = explode(':', $send_start_time);
        $start_time = $time_arr[0] . ':' . $time_arr[1];
        $now = date('H:i');
        if ($start_time === $now) {
            Log::info('cron SendMail $start_time == $now');
            $send_per_hour = $mail_manage->send_per_hour;
            $all_setting = MailSetting::leftjoin('users', 'users.id', 'mail_setting.user_id')->where('account_type', $account_type)->orderBy('id', 'asc')->get()->count();
            $cnt = (int)($all_setting / $send_per_hour);
            if ($all_setting > $send_per_hour * $cnt) {
                $cnt = $cnt + 1;
            }
            Log::info('cron SendMail $cnt =' .$cnt);
            for ($i = 0; $i < $cnt; $i++) {

                $skip = $i * $send_per_hour;
                Log::info('cron SendMail $skip =' .$skip);
                $mail_settings = MailSetting::leftjoin('users', 'users.id', 'mail_setting.user_id')->where('account_type', $account_type)->skip($skip)->take($send_per_hour)->get();
                $search_period = $mail_manage->search_period - 1;
                $mail_header = $mail_manage->mail_header;
                $mail_footer = $mail_manage->mail_footer;
                foreach ($mail_settings as $setting) {
                    $user_id = $setting->user_id;
                    Log::info('cron SendMail $user_id =' .$user_id);
                    $user = User::where('id', $user_id)->get()->first();
                    $header_arr_tmp = explode('%', $mail_header);
                    $message_arr = $header_arr_tmp;
                    foreach ($message_arr as $index => $str){
                        if ($str == "username") {
                            $message_arr[$index] = $user->username;
                        }
                        if ($str == "company_name") {
                            $message_arr[$index] = $user->company_name;
                        }
                        if ($str == "registerday") {
                            $message_arr[$index] = date('Y-m-d', strtotime($user->created_at));
                        }
                    }

                    $header_content = '';
                    foreach ($message_arr as $str){
                        $header_content = $header_content . $str;
                    }
                    $type = $setting->search_type;
                    $classify = $setting->search_classify;
                    $agency = $setting->search_agency;
                    $address = $setting->search_address;
                    $item_classify = $setting->search_item_classify;
                    if ($search_period == 0) {
                        $public_start_date_from = date('Y-m-d');
                    } else {
                        $before = '-' . $search_period . ' days';
                        $public_start_date_from = date('Y-m-d', strtotime($before));
                    }

                    $public_start_date_to = date('Y-m-d');
                    $name = $setting->search_name;
                    $public_id = $setting->search_public_id;
                    $official_text = $setting->search_official_text;
                    $per_page = $setting->search_per_page;
                    $grade = $setting->search_grade;
                    $no_grade = $setting->search_no_grade;

                    $typeArr = [];

                    if (isset($type) && $type != '全ての調達種別') {
                        $typeArr = explode(',', $type);
                    }

                    $agencyArr = [];
                    if (isset($agency) && $agency != '全ての調達品目分類') {
                        $agencyArr = explode(',', $agency);
                    }

                    $addressArr = [];
                    if (isset($address) && $address != '全ての所在地') {
                        $addressArr = explode(',', $address);
                    }

                    $item_classify_arr = [];
                    if (isset($item_classify) && $item_classify != '全ての調達品目分類') {
                        $item_classify_exp = explode(',', $item_classify);
                        foreach ($item_classify_exp as $item) {
                            $item_arr = explode('.', $item);
                            array_push($item_classify_arr, $item_arr[0]);
                        }
                    }

                    if (!isset($public_start_date_from)) {
                        $public_start_date_from = '1950-01-01';
                    }
                    if (!isset($public_start_date_to)) {
                        $public_start_date_to = '2200-01-01';
                    }
                    $name_arr = array();
                    $op_arr = array();
                    if(!isset($name)){
                        $name = '';
                    }
                    else{
                        $len = mb_strlen($name);
                        $start = 0;
                        for($j = 0; $j < $len; $j++){
                            $c = mb_substr($name, $j, 1);
                            if($j == $len -1){
                                $name_arr[] = mb_substr($name, $start, $j - $start + 1);
                            }
                            else if($c === '　' || $c === '＋' || $c === '＾'){
                                $name_arr[] = mb_substr($name, $start, $j - $start);
                                if($c === '　'){
                                    $op_arr[] = 'AND';
                                }
                                if($c === '＋'){
                                    $op_arr[] = 'OR';
                                }
                                if($c === '＾'){
                                    $op_arr[] = 'NOT';
                                }
                                $start = $j+1;
                            }
                        }
                        //$name_arr = explode(' ', $name);
                    }

                    $text_arr = array();
                    $op1_arr = array();
                    if(!isset($official_text)){
                        $official_text = '';
                    }
                    else{
                        $len = mb_strlen($official_text);
                        $start = 0;
                        for($j = 0; $j < $len; $j++){
                            $c = mb_substr($official_text, $j, 1);

                            if($j == $len -1){
                                $text_arr[] = mb_substr($official_text, $start, $j - $start + 1);
                            }
                            else if($c === '　' || $c === '＋' || $c === '＾'){
                                $text_arr[] = mb_substr($official_text, $start, $j - $start);
                                if($c === '　'){
                                    $op1_arr[] = 'AND';
                                }
                                if($c === '＋'){
                                    $op1_arr[] = 'OR';
                                }
                                if($c === '＾'){
                                    $op1_arr[] = 'NOT';
                                }
                                $start = $j+1;
                            }
                        }
                    }

                    if (!isset($public_id)) {
                        $public_id = '';
                    }

                    $gradeArr = [];
                    if (isset($grade)) {
                        $gradeArr = explode(',', $grade);
                    }
                    $no_gradeArr = [];
                    if (isset($no_grade)) {
                        $no_gradeArr = explode(',', $no_grade);
                    }
                    $query = "SELECT A.id, A.public_id, A.classify_code, D.procurement_agency, E.address, A.public_start_date, A.public_end_date, B.procurement_type, A.item_category_1, A.item_category_2, A.item_category_3, A.item_category_4, A.item_category_5, A.item_category_6, A.item_category_7, A.item_category_8, A.procurement_name, A.official_text, A.a_grade, A.b_grade, A.c_grade, A.d_grade, A.ab_grade, A.bc_grade, A.cd_grade, A.abcd_grade, A.abc_grade, A.bcd_grade, A.none_grade
FROM procurement_infos AS A
LEFT JOIN procurement_type_codes AS B ON B.id = A.notification_class
LEFT JOIN procurement_agency_codes AS D ON D.id = A.procurement_agency
LEFT JOIN addresses AS E ON E.id = A.address WHERE";
                    if (!$classify == 0) {
                        $query = $query . " classify_code = '" . $classify . "' AND";
                    }

                    if (count($typeArr) != 0) {
                        $query = $query . " (";
                        foreach ($typeArr as $index => $item) {
                            if ($index != count($typeArr) - 1) {
                                $query = $query . "procurement_type = '" . $item . "' OR ";
                            } else {
                                $query = $query . "procurement_type = '" . $item . "'";
                            }
                        }
                        $query = $query . ") AND";
                    }

                    if (count($agencyArr) != 0) {
                        $query = $query . " (";
                        foreach ($agencyArr as $index => $item) {
                            if ($index != count($agencyArr) - 1) {
                                $query = $query . "procurement_agency = '" . $item . "' OR ";
                            } else {
                                $query = $query . "procurement_agency = '" . $item . "'";
                            }
                        }
                        $query = $query . ") AND";
                    }

                    if (count($addressArr) != 0) {
                        $query = $query . " (";
                        foreach ($addressArr as $index => $item) {
                            if ($index != count($addressArr) - 1) {
                                $query = $query . "E.address = '" . $item . "' OR ";
                            } else {
                                $query = $query . "E.address = '" . $item . "'";
                            }
                        }
                        $query = $query . ") AND";
                    }

                    if (count($item_classify_arr) != 0) {
                        $query = $query . " (";
                        foreach ($item_classify_arr as $index => $item) {
                            if ($index != count($item_classify_arr) - 1) {
                                $query = $query . "(item_category_1 = " . $item . " OR " . "item_category_2 = " . $item . " OR "
                                    . "item_category_3 = " . $item . " OR " . "item_category_4 = " . $item . " OR " . "item_category_5 = " . $item . " OR "
                                    . "item_category_6 = " . $item . " OR " . "item_category_7 = " . $item . " OR " . "item_category_8 = " . $item . ") OR ";
                            } else {
                                $query = $query . "(item_category_1 = " . $item . " OR " . "item_category_2 = " . $item . " OR "
                                    . "item_category_3 = " . $item . " OR " . "item_category_4 = " . $item . " OR " . "item_category_5 = " . $item . " OR "
                                    . "item_category_6 = " . $item . " OR " . "item_category_7 = " . $item . " OR " . "item_category_8 = " . $item . ")";
                            }
                        }
                        $query = $query . ") AND";
                    }

                    if (count($gradeArr) != 0) {
                        $query = $query . " (";
                        foreach ($gradeArr as $index => $item) {
                            if ($index != count($gradeArr) - 1) {
                                $query = $query . $item . "_grade = 1 OR ";
                            } else {
                                $query = $query . $item . "_grade = 1";
                            }
                        }
                        $query = $query . ") AND";
                    }

                    if (count($no_gradeArr) != 0) {
                        $query = $query . " (";
                        foreach ($no_gradeArr as $index => $item) {
                            if ($index != count($no_gradeArr) - 1) {
                                $query = $query . $item . "_grade = 0 OR ";
                            } else {
                                $query = $query . $item . "_grade = 0";
                            }
                        }
                        $query = $query . ") AND";
                    }
                    if(count($name_arr) != 0){
                        $query = $query . " (";
                        foreach ($name_arr as $index => $item){
                            if($index != count($name_arr) - 1){
                                if(isset($op_arr[$index-1]) && $op_arr[$index-1] === 'NOT')
                                {
                                    if($op_arr[$index] === 'NOT'){
                                        $query = $query . "procurement_name NOT LIKE '%" . $item . "%' AND ";
                                    }
                                    else{
                                        $query = $query . "procurement_name NOT LIKE '%" . $item . "%' "  . $op_arr[$index] . " ";
                                    }

                                }
                                else{
                                    if($op_arr[$index] === 'NOT'){
                                        $query = $query . "procurement_name LIKE '%" . $item . "%' AND ";
                                    }
                                    else{
                                        $query = $query . "procurement_name LIKE '%" . $item . "%' " . $op_arr[$index] . " ";
                                    }

                                }
                            }
                            else{
                                if(isset($op_arr[$index-1]) && $op_arr[$index-1] === 'NOT'){
                                    $query = $query . "procurement_name NOT LIKE '%" . $item . "%'";
                                }
                                else{
                                    $query = $query . "procurement_name LIKE '%" . $item . "%'";
                                }
                            }
                        }
                        $query = $query . ") AND";
                    }
                    if(count($text_arr) != 0){
                        $query = $query . " (";
                        foreach ($text_arr as $index => $item){
                            if($index != count($text_arr) - 1){
                                if(isset($op1_arr[$index-1]) && $op1_arr[$index-1] === 'NOT'){
                                    if($op1_arr[$index] === 'NOT'){
                                        $query = $query . "official_text NOT LIKE '%" . $item . "%' AND ";
                                    }
                                    else{
                                        $query = $query . "official_text NOT LIKE '%" . $item . "%' " . $op1_arr[$index] . " ";
                                    }
                                }
                                else{
                                    if($op1_arr[$index] === 'NOT'){
                                        $query = $query . "official_text LIKE '%" . $item . "%' AND ";
                                    }
                                    else{
                                        $query = $query . "official_text LIKE '%" . $item . "%' " . $op1_arr[$index] . " ";
                                    }
                                }

                            }
                            else{
                                if(isset($op1_arr[$index-1]) && $op1_arr[$index-1] === 'NOT'){
                                    $query = $query . "official_text NOT LIKE '%" . $item . "%'";
                                }
                                else{
                                    $query = $query . "official_text LIKE '%" . $item . "%'";
                                }
                            }
                        }
                        $query = $query . ") AND";
                    }
                    $query = $query . " public_start_date >= '" . $public_start_date_from . "'" . " AND public_start_date <= '" . $public_start_date_to . "'"
                        . " AND A.id LIKE '%" . $public_id . "%'"
                        . " ORDER BY id LIMIT 100";
                    $procurements = DB::select($query);
                    $mail_body = $header_content . '<br><br>';
                    if (count($procurements) == 0) {
                        $mail_body = $mail_body . '該当する検索資料がありません。<br>';
                    } else {
                        $mail_body = $mail_body . '<table role="grid" aria-describedby="resultTable_info">
                            <thead>
                            <tr role="row">
                            <th style="width: 30px;" tabindex="0" aria-controls="resultTable" rowspan="1" colspan="1" aria-label="調達案件番号: 列を昇順にソートするためにアクティブにする">ID</th>
                            <th style="width: 200px;" tabindex="0" aria-controls="resultTable" rowspan="1" colspan="1" aria-label="調達案件名称: 列を昇順にソートするためにアクティブにする">調達案件名称</th>
                            <th style="width: 70px;" tabindex="0" aria-controls="resultTable" rowspan="1" colspan="1" aria-label="調達機関: 列を昇順にソートするためにアクティブにする">調達機関</th>
                            <th style="width: 70px;" tabindex="0" aria-controls="resultTable" rowspan="1" colspan="1" aria-label="所在地: 列を昇順にソートするためにアクティブにする">所在地</th>
                            <th style="width: 160px;" tabindex="0" aria-controls="resultTable" rowspan="1" colspan="1" aria-label="調達実施案件公示: 列を昇順にソートするためにアクティブにする">調達実施案件公示</th></tr>
                            </thead>
                            <tbody>';

                        foreach ($procurements as $index => $procurement) {
                            $id = $index + 1;
                            $content = '<tr role="row" class="odd">
                                    <td>' . $id . '</td>
                                    <td>' . $procurement->procurement_name . '</td>
                                    <td>' . $procurement->procurement_agency . '</td>
                                    <td>' . $procurement->address . '</td>
                                    <td>
                                        <a class="koukoku info-button" tabindex="4103" href="https://search.chotatu.info/detail/' . $procurement->id . '">公示本文</a><br>
                                        ' . $procurement->public_start_date . '公開開始
                                    </td>
                                </tr>';
//                            $procurement_name = trim(preg_replace('/\s\s+/', ' ', $procurement->procurement_name));
//                            $content = $procurement->public_id . '   ' . $procurement->public_start_date . ' ~ ' . $procurement->public_end_date . '   ' . $procurement_name . '<br>';
                            $mail_body = $mail_body . $content;
                        }

                        $mail_body = $mail_body . '</tbody></table>';

                    }

                    $mail_body = $mail_body . '<br>' . $mail_footer;

                    $details = array(
                        'mail_body' => $mail_body
                    );
                    $email = $user->email;
                    Log::info('cron SendMail $email =' .$email);
                    Mail::send([], [], function (Message $message) use ($email, $mail_body) {
                        $message->to($email)
                            ->subject('検索資料')
                            ->from('notice@chotatu.info')
                            ->setBody($mail_body, 'text/html');
                    });
                }
                Log::info('cron SendMail sleep');
                sleep(3600);
            }
        }
    }
}
