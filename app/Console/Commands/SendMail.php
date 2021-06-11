<?php

namespace App\Console\Commands;

use App\Models\MailSendManager;
use App\Models\MailSetting;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
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
        $mail_manage = MailSendManager::where('id', '1')->get()->first();
        if ($mail_manage->send_status == 0) {
            return;
        }
        $send_start_time = $mail_manage->send_start_time;
        $time_arr = explode(':', $send_start_time);
        $start_time = $time_arr[0] . ':' . $time_arr[1];
        $now = date('H:m');
        if ($start_time === $now) {
            $send_per_hour = $mail_manage->send_per_hour;
            $all_setting = MailSetting::orderBy('id', 'asc')->get()->count();
            $cnt = (int)($all_setting / $send_per_hour);
            if ($all_setting > $send_per_hour * $cnt) {
                $cnt = $cnt + 1;
            }
            for ($i = 0; $i < $cnt; $i++) {
                $skip = $i * $send_per_hour;
                $mail_settings = MailSetting::skip($skip)->take($send_per_hour)->get();
                $search_period = $mail_manage->search_period - 1;
                $mail_header = $mail_manage->mail_header;
                $mail_footer = $mail_manage->mail_footer;
                foreach ($mail_settings as $setting) {
                    $user_id = $setting->user_id;
                    $user = User::where('id', $user_id)->get()->first();
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

                    $public_start_date_to = date('Y-m-d');;
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
                    if (!isset($name)) {
                        $name = '';
                    }
                    if (!isset($public_id)) {
                        $public_id = '';
                    }
                    if (!isset($official_text)) {
                        $official_text = '';
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
LEFT JOIN procurement_type_codes AS B ON B.id = A.type
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
                                $query = $query . $item . "_grade = 1 AND ";
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
                                $query = $query . $item . "_grade = 0 AND ";
                            } else {
                                $query = $query . $item . "_grade = 0";
                            }
                        }
                        $query = $query . ") AND";
                    }

                    $query = $query . " public_start_date >= '" . $public_start_date_from . "'" . " AND public_start_date <= '" . $public_start_date_to . "'"
                        . " AND procurement_name LIKE '%" . $name . "%'"
                        . " AND official_text LIKE '%" . $official_text . "%'"
                        . " AND public_id LIKE '%" . $public_id . "%'"
                        . " ORDER BY id LIMIT " . $per_page;
                    $procurements = DB::select($query);
                    $mail_body = $mail_header . '<br><br>';
                    if (count($procurements) == 0) {
                        $mail_body = $mail_body . '該当する検索資料がありません。<br>';
                    } else {
                        foreach ($procurements as $procurement) {
                            $procurement_name = trim(preg_replace('/\s\s+/', ' ', $procurement->procurement_name));
                            $content = $procurement->public_id . '   ' . $procurement->public_start_date . ' ~ ' . $procurement->public_end_date . '   ' . $procurement_name . '<br>';
                            $mail_body = $mail_body . $content;
                        }
                    }

                    $mail_body = $mail_body . '<br>' . $mail_footer;

                    $details = array(
                        'mail_body' => $mail_body
                    );
                    $email = $user->email;
                    Mail::send([], [], function (Message $message) use ($email, $mail_body) {
                        $message->to($email)
                            ->subject('my subject')
                            ->from('my@email.com')
                            ->setBody($mail_body, 'text/html');
                    });
//            Mail::to($email)->send(new SendInfoMail($details));
                    //$result = array_slice($procurements, 0, $per_page);
                }
                sleep(3600);
            }
        }
    }
}
