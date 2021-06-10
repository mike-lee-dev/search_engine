<?php

namespace App\Http\Controllers;

use App\Mail\SendInfoMail;
use App\Models\MailSendManager;
use App\Models\MailSetting;
use App\Models\ProcurementInfo;
use App\Models\SearchHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function search()
    {
        return view('user.search');
    }
    public function profile(){
        $user = User::where('id', Auth::user()->id)->get()->first();
        return view('user.profile', [
            'user' => $user
        ]);
    }
    public function modifyProfile(Request $request){
        $password = $request->password;

        if(Auth::user()->change_pw == 1){
            User::where('id', Auth::user()->id)->update(['password' => Hash::make($password)]);

            return response()->json([
                'status' => true
            ]);
        }
        else{
            return response()->json([
                'status' => false
            ]);
        }

    }
    public function searchResult(Request $request)
    {
        $searchCon = array();
        $type = $request['typeCase'];
        $classify= $request['classify'];
        $agency = $request['procurementItemCla'];
        $address = $request['receiptAddress'];
        $item_classify = $request['procurementItemCla'];
        $public_start_date_from = $request['publicStartDateFrom'];
        $public_start_date_to = $request['publicStartDateTo'];
        $public_end_date_from = $request['publicEndDateFrom'];
        $public_end_date_to = $request['publicEndDateTo'];
        $name = $request['articleNm'];
        $public_id = $request['procurementItemNo'];
        $official_text = $request['keyword'];
        $per_page = $request->per_page;
        $grade =  $request['grade'];
        $no_grade = $request['no_grade'];

        $data = [
            'user_id' => Auth::user()->id,
            'search_type' => $type,
            'search_classify' => $classify,
            'search_agency' => $agency,
            'search_address' => $address,
            'search_item_classify' => $item_classify,
            'search_public_start_date_from' => $public_start_date_from,
            'search_public_start_date_to' => $public_start_date_to,
            'search_public_end_date_from' => $public_end_date_from,
            'search_public_end_date_to' => $public_end_date_to,
            'search_name' => $name,
            'search_public_id' => $public_id,
            'search_official_text' => $official_text,
            'search_per_page' => $per_page,
            'search_grade' => $grade,
            'search_no_grade' => $no_grade
        ];

        SearchHistory::create($data);

        $searchCon['type'] = $type;
        $searchCon['classify'] = $classify;
        $searchCon['agency'] = $agency;
        $searchCon['address'] = $address;
        $searchCon['item_classify'] = $item_classify;
        $searchCon['public_start_date_from'] = $public_start_date_from;
        $searchCon['public_start_date_to'] = $public_start_date_to;
        $searchCon['public_end_date_from'] = $public_end_date_from;
        $searchCon['public_end_date_to'] = $public_end_date_to;
        $searchCon['name'] = $name;
        $searchCon['public_id'] = $public_id;
        $searchCon['official_text'] = $official_text;
        $searchCon['per_page'] = $per_page;
        $searchCon['grade'] = $grade;
        $searchCon['no_grade'] = $no_grade;

        $typeArr = [];

        if(isset($type) && $type != '全ての調達種別'){
            $typeArr = explode(',', $type);
        }

        $agencyArr = [];
        if(isset($agency) && $agency != '全ての調達品目分類'){
            $agencyArr = explode(',', $agency);
        }

        $addressArr = [];
        if(isset($address) && $address != '全ての所在地'){
            $addressArr = explode(',', $address);
        }

        $item_classify_arr = [];
        if(isset($item_classify) && $item_classify != '全ての調達品目分類'){
            $item_classify_exp = explode(',', $item_classify);
            foreach ($item_classify_exp as $item){
                $item_arr = explode('.', $item);
                array_push($item_classify_arr, $item_arr[0]);
            }
        }

        if(!isset($public_start_date_from)){
            $public_start_date_from = '1950-01-01';
        }
        if(!isset($public_start_date_to)){
            $public_start_date_to = '2200-01-01';
        }
        if(!isset($public_end_date_from)){
            $public_end_date_from = '1950-01-01';
        }
        if(!isset($public_end_date_to)){
            $public_end_date_to = '2250-01-01';
        }
        if(!isset($name)){
            $name = '';
        }
        if(!isset($public_id)){
            $public_id = '';
        }
        if(!isset($official_text)){
            $official_text = '';
        }
        $gradeArr = [];
        if(isset($grade)){
            $gradeArr = explode(',', $grade);
        }
        $no_gradeArr = [];
        if(isset($no_grade)){
            $no_gradeArr = explode(',', $no_grade);
        }
        $query = "SELECT A.id, A.public_id, A.classify_code, D.procurement_agency, E.address, A.public_start_date, A.public_end_date, B.procurement_type, A.item_category_1, A.item_category_2, A.item_category_3, A.item_category_4, A.item_category_5, A.item_category_6, A.item_category_7, A.item_category_8, A.procurement_name, A.official_text, A.a_grade, A.b_grade, A.c_grade, A.d_grade, A.ab_grade, A.bc_grade, A.cd_grade, A.abcd_grade, A.abc_grade, A.bcd_grade, A.none_grade
FROM procurement_infos AS A
LEFT JOIN procurement_type_codes AS B ON B.id = A.type
LEFT JOIN procurement_agency_codes AS D ON D.id = A.procurement_agency
LEFT JOIN addresses AS E ON E.id = A.address WHERE";
        if(!$classify == 0){
            $query = $query . " classify_code = '" . $classify . "' AND";
        }

        if(count($typeArr) != 0){
            $query = $query . " (";
            foreach ($typeArr as $index => $item){
                if($index != count($typeArr) - 1){
                    $query = $query . "procurement_type = '" . $item . "' OR ";
                }
                else{
                    $query = $query . "procurement_type = '" . $item . "'";
                }
            }
            $query = $query . ") AND";
        }

        if(count($agencyArr) != 0){
            $query = $query . " (";
            foreach ($agencyArr as $index => $item){
                if($index != count($agencyArr) - 1){
                    $query = $query . "procurement_agency = '" . $item . "' OR ";
                }
                else{
                    $query = $query . "procurement_agency = '" . $item . "'";
                }
            }
            $query = $query . ") AND";
        }

        if(count($addressArr) != 0){
            $query = $query . " (";
            foreach ($addressArr as $index => $item){
                if($index != count($addressArr) - 1){
                    $query = $query . "address = '" . $item . "' OR ";
                }
                else{
                    $query = $query . "address = '" . $item . "'";
                }
            }
            $query = $query . ") AND";
        }

        if(count($item_classify_arr) != 0){
            $query = $query . " (";
            foreach ($item_classify_arr as $index => $item){
                if($index != count($item_classify_arr) - 1){
                    $query = $query . "(item_category_1 = " . $item . " OR " . "item_category_2 = " . $item . " OR "
                        . "item_category_3 = " . $item . " OR " . "item_category_4 = " . $item . " OR " . "item_category_5 = " . $item . " OR "
                        . "item_category_6 = " . $item . " OR " . "item_category_7 = " . $item . " OR " . "item_category_8 = " . $item . ") OR ";
                }
                else{
                    $query = $query . "(item_category_1 = " . $item . " OR " . "item_category_2 = " . $item . " OR "
                        . "item_category_3 = " . $item . " OR " . "item_category_4 = " . $item . " OR " . "item_category_5 = " . $item . " OR "
                        . "item_category_6 = " . $item . " OR " . "item_category_7 = " . $item . " OR " . "item_category_8 = " . $item . ")";
                }
            }
            $query = $query . ") AND";
        }

        if(count($gradeArr) != 0){
            $query = $query . " (";
            foreach ($gradeArr as $index => $item){
                if($index != count($gradeArr) - 1){
                    $query = $query . $item . "_grade = 1 AND ";
                }
                else{
                    $query = $query . $item . "_grade = 1";
                }
            }
            $query = $query . ") AND";
        }

        if(count($no_gradeArr) != 0){
            $query = $query . " (";
            foreach ($no_gradeArr as $index => $item){
                if($index != count($no_gradeArr) - 1){
                    $query = $query . $item . "_grade = 0 AND ";
                }
                else{
                    $query = $query . $item . "_grade = 0";
                }
            }
            $query = $query . ") AND";
        }

        $query = $query . " public_start_date >= '" . $public_start_date_from . "'" . " AND public_start_date <= '" . $public_start_date_to . "'"
            . " AND public_end_date >= '" . $public_end_date_from . "'" . " AND public_end_date <= '" . $public_end_date_to . "'"
            . " AND procurement_name LIKE '%" . $name . "%'"
            . " AND official_text LIKE '%" . $official_text . "%'"
            . " AND public_id LIKE '%" . $public_id . "%'"
            . " ORDER BY id";


        $procurements = DB::select($query);

        $query_cnt = count($procurements);
        $overflow = false;
        if($query_cnt > $per_page){
            $overflow = true;
        }

        $result = array_slice($procurements, 0, $per_page);
        $result_cnt = count($result);
        $search_histories = SearchHistory::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->limit(10)->get();
        foreach ($search_histories as $history){
            if($history->search_public_start_date_from == null && $history->search_public_start_date_to == null){
                $history->public_start = '指定なし';
            }
            else{
                $history->public_start = $history->search_public_start_date_from . ' ~ ' . $history->search_public_start_date_to;
            }
            if($history->search_public_end_date_from == null && $history->search_public_end_date_to == null){
                $history->public_end = '指定なし';
            }
            else{
                $history->public_end = $history->search_public_end_date_from . ' ~ ' . $history->search_public_end_date_to;
            }
            if($history->search_grade == null){
                $history->grade = '指定なし';
            }
            else{
                $gradeArr = explode(',', $history->search_grade);
                $grade_str = '';
                foreach ($gradeArr as $grade){
                    if($grade != 'none'){
                        $grade_str = $grade_str . strtoupper($grade) . ',';
                    }
                    else{
                        $grade_str = $grade_str . '等級なし,';
                    }
                }
                $history->grade = $grade_str;
            }
            if($history->search_no_grade == null){
                $history->no_grade = '指定なし';
            }
            else{
                $gradeArr = explode(',', $history->search_no_grade);
                $grade_str = '';
                foreach ($gradeArr as $grade){
                    if($grade != 'none'){
                        $grade_str = $grade_str . strtoupper($grade) . ',';
                    }
                    else{
                        $grade_str = $grade_str . '等級なし,';
                    }
                }
                $history->no_grade = $grade_str;
            }

        }
        return view('user.result', [
            'procurements' => $result,
            'cnt' => $result_cnt,
            'searchCon' => json_encode($searchCon),
            'overflow' => $overflow,
            'search_histories' => $search_histories,
        ]);
    }

    public function mailSetting()
    {
        return view('user.mail-setting');
    }

    public function mailSettingSave(Request $request)
    {
        $searchCon = array();
        $type = $request['typeCase'];
        $classify= $request['classify'];
        $agency = $request['procurementItemCla'];
        $address = $request['receiptAddress'];
        $item_classify = $request['procurementItemCla'];
        $name = $request['articleNm'];
        $public_id = $request['procurementItemNo'];
        $official_text = $request['keyword'];
        $per_page = $request->per_page;
        $grade =  $request['grade'];
        $no_grade = $request['no_grade'];

        $data = [
            'user_id' => Auth::user()->id,
            'search_type' => $type,
            'search_classify' => $classify,
            'search_agency' => $agency,
            'search_address' => $address,
            'search_item_classify' => $item_classify,
            'search_name' => $name,
            'search_public_id' => $public_id,
            'search_official_text' => $official_text,
            'search_per_page' => $per_page,
            'search_grade' => $grade,
            'search_no_grade' => $no_grade
        ];

        MailSetting::where('user_id', Auth::user()->id)->delete();
        MailSetting::create($data);

        $searchCon['type'] = $type;
        $searchCon['classify'] = $classify;
        $searchCon['agency'] = $agency;
        $searchCon['address'] = $address;
        $searchCon['item_classify'] = $item_classify;
        $searchCon['public_start_date_from'] = null;
        $searchCon['public_start_date_to'] = null;
        $searchCon['public_end_date_from'] = null;
        $searchCon['public_end_date_to'] = null;
        $searchCon['name'] = $name;
        $searchCon['public_id'] = $public_id;
        $searchCon['official_text'] = $official_text;
        $searchCon['per_page'] = $per_page;
        $searchCon['grade'] = $grade;
        $searchCon['no_grade'] = $no_grade;

        $typeArr = [];

        if(isset($type) && $type != '全ての調達種別'){
            $typeArr = explode(',', $type);
        }

        $agencyArr = [];
        if(isset($agency) && $agency != '全ての調達品目分類'){
            $agencyArr = explode(',', $agency);
        }

        $addressArr = [];
        if(isset($address) && $address != '全ての所在地'){
            $addressArr = explode(',', $address);
        }

        $item_classify_arr = [];
        if(isset($item_classify) && $item_classify != '全ての調達品目分類'){
            $item_classify_exp = explode(',', $item_classify);
            foreach ($item_classify_exp as $item){
                $item_arr = explode('.', $item);
                array_push($item_classify_arr, $item_arr[0]);
            }
        }

        if(!isset($name)){
            $name = '';
        }
        if(!isset($public_id)){
            $public_id = '';
        }
        if(!isset($official_text)){
            $official_text = '';
        }
        $gradeArr = [];
        if(isset($grade)){
            $gradeArr = explode(',', $grade);
        }
        $no_gradeArr = [];
        if(isset($no_grade)){
            $no_gradeArr = explode(',', $no_grade);
        }
        $query = "SELECT A.id, A.public_id, A.classify_code, D.procurement_agency, E.address, A.public_start_date, A.public_end_date, B.procurement_type, A.item_category_1, A.item_category_2, A.item_category_3, A.item_category_4, A.item_category_5, A.item_category_6, A.item_category_7, A.item_category_8, A.procurement_name, A.official_text, A.a_grade, A.b_grade, A.c_grade, A.d_grade, A.ab_grade, A.bc_grade, A.cd_grade, A.abcd_grade, A.abc_grade, A.bcd_grade, A.none_grade
FROM procurement_infos AS A
LEFT JOIN procurement_type_codes AS B ON B.id = A.type
LEFT JOIN procurement_agency_codes AS D ON D.id = A.procurement_agency
LEFT JOIN addresses AS E ON E.id = A.address WHERE";
        if(!$classify == 0){
            $query = $query . " classify_code = '" . $classify . "' AND";
        }

        if(count($typeArr) != 0){
            $query = $query . " (";
            foreach ($typeArr as $index => $item){
                if($index != count($typeArr) - 1){
                    $query = $query . "procurement_type = '" . $item . "' OR ";
                }
                else{
                    $query = $query . "procurement_type = '" . $item . "'";
                }
            }
            $query = $query . ") AND";
        }

        if(count($agencyArr) != 0){
            $query = $query . " (";
            foreach ($agencyArr as $index => $item){
                if($index != count($agencyArr) - 1){
                    $query = $query . "procurement_agency = '" . $item . "' OR ";
                }
                else{
                    $query = $query . "procurement_agency = '" . $item . "'";
                }
            }
            $query = $query . ") AND";
        }

        if(count($addressArr) != 0){
            $query = $query . " (";
            foreach ($addressArr as $index => $item){
                if($index != count($addressArr) - 1){
                    $query = $query . "address = '" . $item . "' OR ";
                }
                else{
                    $query = $query . "address = '" . $item . "'";
                }
            }
            $query = $query . ") AND";
        }

        if(count($item_classify_arr) != 0){
            $query = $query . " (";
            foreach ($item_classify_arr as $index => $item){
                if($index != count($item_classify_arr) - 1){
                    $query = $query . "(item_category_1 = " . $item . " OR " . "item_category_2 = " . $item . " OR "
                        . "item_category_3 = " . $item . " OR " . "item_category_4 = " . $item . " OR " . "item_category_5 = " . $item . " OR "
                        . "item_category_6 = " . $item . " OR " . "item_category_7 = " . $item . " OR " . "item_category_8 = " . $item . ") OR ";
                }
                else{
                    $query = $query . "(item_category_1 = " . $item . " OR " . "item_category_2 = " . $item . " OR "
                        . "item_category_3 = " . $item . " OR " . "item_category_4 = " . $item . " OR " . "item_category_5 = " . $item . " OR "
                        . "item_category_6 = " . $item . " OR " . "item_category_7 = " . $item . " OR " . "item_category_8 = " . $item . ")";
                }
            }
            $query = $query . ") AND";
        }

        if(count($gradeArr) != 0){
            $query = $query . " (";
            foreach ($gradeArr as $index => $item){
                if($index != count($gradeArr) - 1){
                    $query = $query . $item . "_grade = 1 AND ";
                }
                else{
                    $query = $query . $item . "_grade = 1";
                }
            }
            $query = $query . ") AND";
        }

        if(count($no_gradeArr) != 0){
            $query = $query . " (";
            foreach ($no_gradeArr as $index => $item){
                if($index != count($no_gradeArr) - 1){
                    $query = $query . $item . "_grade = 0 AND ";
                }
                else{
                    $query = $query . $item . "_grade = 0";
                }
            }
            $query = $query . ") AND";
        }

        $query = $query . " procurement_name LIKE '%" . $name . "%'"
            . " AND official_text LIKE '%" . $official_text . "%'"
            . " AND public_id LIKE '%" . $public_id . "%'"
            . " ORDER BY id";


        $procurements = DB::select($query);

        $query_cnt = count($procurements);
        $overflow = false;
        if($query_cnt > $per_page){
            $overflow = true;
        }

        $result = array_slice($procurements, 0, $per_page);
        $result_cnt = count($result);
        $search_histories = SearchHistory::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->limit(10)->get();
        foreach ($search_histories as $history){
            if($history->search_public_start_date_from == null && $history->search_public_start_date_to == null){
                $history->public_start = '指定なし';
            }
            else{
                $history->public_start = $history->search_public_start_date_from . ' ~ ' . $history->search_public_start_date_to;
            }
            if($history->search_public_end_date_from == null && $history->search_public_end_date_to == null){
                $history->public_end = '指定なし';
            }
            else{
                $history->public_end = $history->search_public_end_date_from . ' ~ ' . $history->search_public_end_date_to;
            }
            if($history->search_grade == null){
                $history->grade = '指定なし';
            }
            else{
                $gradeArr = explode(',', $history->search_grade);
                $grade_str = '';
                foreach ($gradeArr as $grade){
                    if($grade != 'none'){
                        $grade_str = $grade_str . strtoupper($grade) . ',';
                    }
                    else{
                        $grade_str = $grade_str . '等級なし,';
                    }
                }
                $history->grade = $grade_str;
            }
            if($history->search_no_grade == null){
                $history->no_grade = '指定なし';
            }
            else{
                $gradeArr = explode(',', $history->search_no_grade);
                $grade_str = '';
                foreach ($gradeArr as $grade){
                    if($grade != 'none'){
                        $grade_str = $grade_str . strtoupper($grade) . ',';
                    }
                    else{
                        $grade_str = $grade_str . '等級なし,';
                    }
                }
                $history->no_grade = $grade_str;
            }

        }
        return view('user.result', [
            'procurements' => $result,
            'cnt' => $result_cnt,
            'searchCon' => json_encode($searchCon),
            'overflow' => $overflow,
            'search_histories' => $search_histories,
        ]);
    }
    public function result()
    {
        return view('user.result');
    }
    public function detail($id)
    {
        $info = ProcurementInfo::leftjoin('procurement_type_codes', 'procurement_type_codes.id', 'procurement_infos.type')
            ->leftjoin('procurement_agency_codes', 'procurement_agency_codes.id', 'procurement_infos.procurement_agency')
            ->leftjoin('addresses', 'addresses.id', 'procurement_infos.address')
            ->leftjoin('classify_codes', 'classify_codes.id', 'procurement_infos.classify_code')
            ->leftjoin('item_classify_codes as item_1', 'item_1.id', 'procurement_infos.item_category_1')
            ->leftjoin('item_classify_codes as item_2', 'item_2.id', 'procurement_infos.item_category_2')
            ->leftjoin('item_classify_codes as item_3', 'item_3.id', 'procurement_infos.item_category_3')
            ->leftjoin('item_classify_codes as item_4', 'item_4.id', 'procurement_infos.item_category_4')
            ->leftjoin('item_classify_codes as item_5', 'item_5.id', 'procurement_infos.item_category_5')
            ->leftjoin('item_classify_codes as item_6', 'item_6.id', 'procurement_infos.item_category_6')
            ->leftjoin('item_classify_codes as item_7', 'item_7.id', 'procurement_infos.item_category_7')
            ->leftjoin('item_classify_codes as item_8', 'item_8.id', 'procurement_infos.item_category_8')
            ->select(DB::raw('procurement_infos.*, procurement_agency_codes.procurement_agency, procurement_type_codes.procurement_type,
            addresses.address as address_name, classify_codes.classify, item_1.item_classify as item_classify_1, item_2.item_classify as item_classify_2,
            item_3.item_classify as item_classify_3, item_4.item_classify as item_classify_4, item_5.item_classify as item_classify_5,
            item_6.item_classify as item_classify_6, item_7.item_classify as item_classify_7, item_8.item_classify as item_classify_8'))->where('procurement_infos.id', $id)->get()->first();
        return view('user.detail', [
            'info' => $info,

        ]);
    }

    public function historySearch($id){
        $searchHistory = SearchHistory::where('id', $id)->get()->first();
        $searchCon = array();
        $type = $searchHistory->search_type;
        $classify= $searchHistory->search_classify;
        $agency = $searchHistory->search_agency;
        $address = $searchHistory->search_address;
        $item_classify = $searchHistory->search_item_classify;
        $public_start_date_from = $searchHistory->search_public_start_date_from;
        $public_start_date_to = $searchHistory->search_public_start_date_to;
        $public_end_date_from = $searchHistory->search_public_end_date_from;
        $public_end_date_to = $searchHistory->search_public_end_date_to;
        $name = $searchHistory->search_name;
        $public_id = $searchHistory->search_public_id;
        $official_text = $searchHistory->search_official_text;
        $per_page = $searchHistory->search_per_page;
        $grade =  $searchHistory->search_grade;
        $no_grade = $searchHistory->search_no_grade;


        $searchCon['type'] = $type;
        $searchCon['classify'] = $classify;
        $searchCon['agency'] = $agency;
        $searchCon['address'] = $address;
        $searchCon['item_classify'] = $item_classify;
        $searchCon['public_start_date_from'] = $public_start_date_from;
        $searchCon['public_start_date_to'] = $public_start_date_to;
        $searchCon['public_end_date_from'] = $public_end_date_from;
        $searchCon['public_end_date_to'] = $public_end_date_to;
        $searchCon['name'] = $name;
        $searchCon['public_id'] = $public_id;
        $searchCon['official_text'] = $official_text;
        $searchCon['per_page'] = $per_page;
        $searchCon['grade'] = $grade;
        $searchCon['no_grade'] = $no_grade;

        $typeArr = [];

        if(isset($type) && $type != '全ての調達種別'){
            $typeArr = explode(',', $type);
        }

        $agencyArr = [];
        if(isset($agency) && $agency != '全ての調達品目分類'){
            $agencyArr = explode(',', $agency);
        }

        $addressArr = [];
        if(isset($address) && $address != '全ての所在地'){
            $addressArr = explode(',', $address);
        }

        $item_classify_arr = [];
        if(isset($item_classify) && $item_classify != '全ての調達品目分類'){
            $item_classify_exp = explode(',', $item_classify);
            foreach ($item_classify_exp as $item){
                $item_arr = explode('.', $item);
                array_push($item_classify_arr, $item_arr[0]);
            }
        }

        if(!isset($public_start_date_from)){
            $public_start_date_from = '1950-01-01';
        }
        if(!isset($public_start_date_to)){
            $public_start_date_to = '2200-01-01';
        }
        if(!isset($public_end_date_from)){
            $public_end_date_from = '1950-01-01';
        }
        if(!isset($public_end_date_to)){
            $public_end_date_to = '2250-01-01';
        }
        if(!isset($name)){
            $name = '';
        }
        if(!isset($public_id)){
            $public_id = '';
        }
        if(!isset($official_text)){
            $official_text = '';
        }
        $gradeArr = [];
        if(isset($grade)){
            $gradeArr = explode(',', $grade);
        }
        $no_gradeArr = [];
        if(isset($no_grade)){
            $no_gradeArr = explode(',', $no_grade);
        }
        $query = "SELECT A.id, A.public_id, A.classify_code, D.procurement_agency, E.address, A.public_start_date, A.public_end_date, B.procurement_type, A.item_category_1, A.item_category_2, A.item_category_3, A.item_category_4, A.item_category_5, A.item_category_6, A.item_category_7, A.item_category_8, A.procurement_name, A.official_text, A.a_grade, A.b_grade, A.c_grade, A.d_grade, A.ab_grade, A.bc_grade, A.cd_grade, A.abcd_grade, A.abc_grade, A.bcd_grade, A.none_grade
FROM procurement_infos AS A
LEFT JOIN procurement_type_codes AS B ON B.id = A.type
LEFT JOIN procurement_agency_codes AS D ON D.id = A.procurement_agency
LEFT JOIN addresses AS E ON E.id = A.address WHERE";
        if(!$classify == 0){
            $query = $query . " classify_code = '" . $classify . "' AND";
        }

        if(count($typeArr) != 0){
            $query = $query . " (";
            foreach ($typeArr as $index => $item){
                if($index != count($typeArr) - 1){
                    $query = $query . "procurement_type = '" . $item . "' OR ";
                }
                else{
                    $query = $query . "procurement_type = '" . $item . "'";
                }
            }
            $query = $query . ") AND";
        }

        if(count($agencyArr) != 0){
            $query = $query . " (";
            foreach ($agencyArr as $index => $item){
                if($index != count($agencyArr) - 1){
                    $query = $query . "procurement_agency = '" . $item . "' OR ";
                }
                else{
                    $query = $query . "procurement_agency = '" . $item . "'";
                }
            }
            $query = $query . ") AND";
        }

        if(count($addressArr) != 0){
            $query = $query . " (";
            foreach ($addressArr as $index => $item){
                if($index != count($addressArr) - 1){
                    $query = $query . "address = '" . $item . "' OR ";
                }
                else{
                    $query = $query . "address = '" . $item . "'";
                }
            }
            $query = $query . ") AND";
        }

        if(count($item_classify_arr) != 0){
            $query = $query . " (";
            foreach ($item_classify_arr as $index => $item){
                if($index != count($item_classify_arr) - 1){
                    $query = $query . "(item_category_1 = " . $item . " OR " . "item_category_2 = " . $item . " OR "
                        . "item_category_3 = " . $item . " OR " . "item_category_4 = " . $item . " OR " . "item_category_5 = " . $item . " OR "
                        . "item_category_6 = " . $item . " OR " . "item_category_7 = " . $item . " OR " . "item_category_8 = " . $item . ") OR ";
                }
                else{
                    $query = $query . "(item_category_1 = " . $item . " OR " . "item_category_2 = " . $item . " OR "
                        . "item_category_3 = " . $item . " OR " . "item_category_4 = " . $item . " OR " . "item_category_5 = " . $item . " OR "
                        . "item_category_6 = " . $item . " OR " . "item_category_7 = " . $item . " OR " . "item_category_8 = " . $item . ")";
                }
            }
            $query = $query . ") AND";
        }

        if(count($gradeArr) != 0){
            $query = $query . " (";
            foreach ($gradeArr as $index => $item){
                if($index != count($gradeArr) - 1){
                    $query = $query . $item . "_grade = 1 AND ";
                }
                else{
                    $query = $query . $item . "_grade = 1";
                }
            }
            $query = $query . ") AND";
        }

        if(count($no_gradeArr) != 0){
            $query = $query . " (";
            foreach ($no_gradeArr as $index => $item){
                if($index != count($no_gradeArr) - 1){
                    $query = $query . $item . "_grade = 0 AND ";
                }
                else{
                    $query = $query . $item . "_grade = 0";
                }
            }
            $query = $query . ") AND";
        }

        $query = $query . " public_start_date >= '" . $public_start_date_from . "'" . " AND public_start_date <= '" . $public_start_date_to . "'"
            . " AND public_end_date >= '" . $public_end_date_from . "'" . " AND public_end_date <= '" . $public_end_date_to . "'"
            . " AND procurement_name LIKE '%" . $name . "%'"
            . " AND official_text LIKE '%" . $official_text . "%'"
            . " AND public_id LIKE '%" . $public_id . "%'"
            . " ORDER BY id";


        $procurements = DB::select($query);

        $query_cnt = count($procurements);
        $overflow = false;
        if($query_cnt > $per_page){
            $overflow = true;
        }

        $result = array_slice($procurements, 0, $per_page);
        $result_cnt = count($result);
        $search_histories = SearchHistory::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->limit(10)->get();
        foreach ($search_histories as $history){
            if($history->search_public_start_date_from == null && $history->search_public_start_date_to == null){
                $history->public_start = '指定なし';
            }
            else{
                $history->public_start = $history->search_public_start_date_from . ' ~ ' . $history->search_public_start_date_to;
            }
            if($history->search_public_end_date_from == null && $history->search_public_end_date_to == null){
                $history->public_end = '指定なし';
            }
            else{
                $history->public_end = $history->search_public_end_date_from . ' ~ ' . $history->search_public_end_date_to;
            }
            if($history->search_grade == null){
                $history->grade = '指定なし';
            }
            else{
                $gradeArr = explode(',', $history->search_grade);
                $grade_str = '';
                foreach ($gradeArr as $grade){
                    if($grade != 'none'){
                        $grade_str = $grade_str . strtoupper($grade) . ',';
                    }
                    else{
                        $grade_str = $grade_str . '等級なし,';
                    }
                }
                $history->grade = $grade_str;
            }
            if($history->search_no_grade == null){
                $history->no_grade = '指定なし';
            }
            else{
                $gradeArr = explode(',', $history->search_no_grade);
                $grade_str = '';
                foreach ($gradeArr as $grade){
                    if($grade != 'none'){
                        $grade_str = $grade_str . strtoupper($grade) . ',';
                    }
                    else{
                        $grade_str = $grade_str . '等級なし,';
                    }
                }
                $history->no_grade = $grade_str;
            }

        }
        return view('user.result', [
            'procurements' => $result,
            'cnt' => $result_cnt,
            'searchCon' => json_encode($searchCon),
            'overflow' => $overflow,
            'search_histories' => $search_histories,
        ]);

    }


    //admin

    public function adminUsers(){
        return view('admin.users', [
            'tab' => 'users'
        ]);
    }
    public function userProfile($id){
        $user = User::where('id', $id)->get()->first();
        return view('admin.profile', [
            'user' => $user,
            'tab' => 'users'
        ]);
    }
    public function changePw(Request $request){
        $id = $request->user_id;
        $change_pw = $request->change_pw;
        $user = User::where('id', $id)->update(['change_pw' => $change_pw]);
        return response()->json([
            'status' => true
        ]);
    }
    public function userDelete($id){
        User::where('id', $id)->delete();
        return redirect('/users');
    }
    public function adminUsersTable(Request $request){
        $company_name = $request->company_name;
        $email = $request->email;
        $users = User::where('role', 'user')->where('company_name', 'like', '%' . $company_name . '%')->where('email', 'like', '%' . $email . '%')->get();
        return view('admin.users-table', [
            'tab' => 'users',
            'users' => $users
        ]);
    }

    public function adminMailSetting(){
        $manage = MailSendManager::where('id', '1')->get()->first();
        return view('admin.mails', [
            'tab' => 'mails',
            'manage' => $manage
        ]);
    }
    public function adminMailManage(Request $request){

        MailSendManager::where('id', '1')->update([
            'search_period' => $request->search_period,
            'send_start_time' => $request->send_start_time,
            'send_per_hour' => $request->send_per_hour,
            'send_status' => $request->send_status,
            'mail_header' => $request->mail_header,
            'mail_footer' => $request->mail_footer
        ]);
        return response()->json([
            'status' => true
        ]);
    }
    public function adminMailManage1(){
        $mail_manage = MailSendManager::where('id', '1')->get()->first();
        if($mail_manage->send_status == 0){
            return;
        }
        $send_start_time = $mail_manage->send_start_time;
        $time_arr = explode(':', $send_start_time);
        $start_time = $time_arr[0] . ':' . $time_arr[1];
        $now = date('H:m');
        if($start_time === $now){
            $send_per_hour = $mail_manage->send_per_hour;
            $all_setting = MailSetting::orderBy('id', 'asc')->get()->count();
            $cnt = (int) ($all_setting / $send_per_hour);
            if($all_setting > $send_per_hour * $cnt){
                $cnt = $cnt+1;
            }
            for($i = 0; $i < $cnt; $i++){
                $skip = $i * $send_per_hour;
                $mail_settings = MailSetting::skip($skip)->take($send_per_hour)->get();
                $search_period = $mail_manage->search_period - 1;
                $mail_header = $mail_manage->mail_header;
                $mail_footer = $mail_manage->mail_footer;
                foreach ($mail_settings as $setting){
                    $user_id = $setting->user_id;
                    $user = User::where('id', $user_id)->get()->first();
                    $type = $setting->search_type;
                    $classify= $setting->search_classify;
                    $agency = $setting->search_agency;
                    $address = $setting->search_address;
                    $item_classify = $setting->search_item_classify;
                    if($search_period == 0){
                        $public_start_date_from = date('Y-m-d');
                    }
                    else{
                        $before = '-' . $search_period . ' days';
                        $public_start_date_from = date('Y-m-d', strtotime($before));
                    }

                    $public_start_date_to = date('Y-m-d');;
                    $name = $setting->search_name;
                    $public_id = $setting->search_public_id;
                    $official_text = $setting->search_official_text;
                    $per_page = $setting->search_per_page;
                    $grade =  $setting->search_grade;
                    $no_grade = $setting->search_no_grade;

                    $typeArr = [];

                    if(isset($type) && $type != '全ての調達種別'){
                        $typeArr = explode(',', $type);
                    }

                    $agencyArr = [];
                    if(isset($agency) && $agency != '全ての調達品目分類'){
                        $agencyArr = explode(',', $agency);
                    }

                    $addressArr = [];
                    if(isset($address) && $address != '全ての所在地'){
                        $addressArr = explode(',', $address);
                    }

                    $item_classify_arr = [];
                    if(isset($item_classify) && $item_classify != '全ての調達品目分類'){
                        $item_classify_exp = explode(',', $item_classify);
                        foreach ($item_classify_exp as $item){
                            $item_arr = explode('.', $item);
                            array_push($item_classify_arr, $item_arr[0]);
                        }
                    }

                    if(!isset($public_start_date_from)){
                        $public_start_date_from = '1950-01-01';
                    }
                    if(!isset($public_start_date_to)){
                        $public_start_date_to = '2200-01-01';
                    }
                    if(!isset($name)){
                        $name = '';
                    }
                    if(!isset($public_id)){
                        $public_id = '';
                    }
                    if(!isset($official_text)){
                        $official_text = '';
                    }
                    $gradeArr = [];
                    if(isset($grade)){
                        $gradeArr = explode(',', $grade);
                    }
                    $no_gradeArr = [];
                    if(isset($no_grade)){
                        $no_gradeArr = explode(',', $no_grade);
                    }
                    $query = "SELECT A.id, A.public_id, A.classify_code, D.procurement_agency, E.address, A.public_start_date, A.public_end_date, B.procurement_type, A.item_category_1, A.item_category_2, A.item_category_3, A.item_category_4, A.item_category_5, A.item_category_6, A.item_category_7, A.item_category_8, A.procurement_name, A.official_text, A.a_grade, A.b_grade, A.c_grade, A.d_grade, A.ab_grade, A.bc_grade, A.cd_grade, A.abcd_grade, A.abc_grade, A.bcd_grade, A.none_grade
FROM procurement_infos AS A
LEFT JOIN procurement_type_codes AS B ON B.id = A.type
LEFT JOIN procurement_agency_codes AS D ON D.id = A.procurement_agency
LEFT JOIN addresses AS E ON E.id = A.address WHERE";
                    if(!$classify == 0){
                        $query = $query . " classify_code = '" . $classify . "' AND";
                    }

                    if(count($typeArr) != 0){
                        $query = $query . " (";
                        foreach ($typeArr as $index => $item){
                            if($index != count($typeArr) - 1){
                                $query = $query . "procurement_type = '" . $item . "' OR ";
                            }
                            else{
                                $query = $query . "procurement_type = '" . $item . "'";
                            }
                        }
                        $query = $query . ") AND";
                    }

                    if(count($agencyArr) != 0){
                        $query = $query . " (";
                        foreach ($agencyArr as $index => $item){
                            if($index != count($agencyArr) - 1){
                                $query = $query . "procurement_agency = '" . $item . "' OR ";
                            }
                            else{
                                $query = $query . "procurement_agency = '" . $item . "'";
                            }
                        }
                        $query = $query . ") AND";
                    }

                    if(count($addressArr) != 0){
                        $query = $query . " (";
                        foreach ($addressArr as $index => $item){
                            if($index != count($addressArr) - 1){
                                $query = $query . "address = '" . $item . "' OR ";
                            }
                            else{
                                $query = $query . "address = '" . $item . "'";
                            }
                        }
                        $query = $query . ") AND";
                    }

                    if(count($item_classify_arr) != 0){
                        $query = $query . " (";
                        foreach ($item_classify_arr as $index => $item){
                            if($index != count($item_classify_arr) - 1){
                                $query = $query . "(item_category_1 = " . $item . " OR " . "item_category_2 = " . $item . " OR "
                                    . "item_category_3 = " . $item . " OR " . "item_category_4 = " . $item . " OR " . "item_category_5 = " . $item . " OR "
                                    . "item_category_6 = " . $item . " OR " . "item_category_7 = " . $item . " OR " . "item_category_8 = " . $item . ") OR ";
                            }
                            else{
                                $query = $query . "(item_category_1 = " . $item . " OR " . "item_category_2 = " . $item . " OR "
                                    . "item_category_3 = " . $item . " OR " . "item_category_4 = " . $item . " OR " . "item_category_5 = " . $item . " OR "
                                    . "item_category_6 = " . $item . " OR " . "item_category_7 = " . $item . " OR " . "item_category_8 = " . $item . ")";
                            }
                        }
                        $query = $query . ") AND";
                    }

                    if(count($gradeArr) != 0){
                        $query = $query . " (";
                        foreach ($gradeArr as $index => $item){
                            if($index != count($gradeArr) - 1){
                                $query = $query . $item . "_grade = 1 AND ";
                            }
                            else{
                                $query = $query . $item . "_grade = 1";
                            }
                        }
                        $query = $query . ") AND";
                    }

                    if(count($no_gradeArr) != 0){
                        $query = $query . " (";
                        foreach ($no_gradeArr as $index => $item){
                            if($index != count($no_gradeArr) - 1){
                                $query = $query . $item . "_grade = 0 AND ";
                            }
                            else{
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
                    if(count($procurements) == 0){
                        $mail_body = $mail_body . '該当する検索資料がありません。<br>';
                    }
                    else{
                        foreach ($procurements as $procurement){
                            $procurement_name = trim(preg_replace('/\s\s+/', ' ', $procurement->procurement_name));
                            $content = $procurement->public_id . '   ' . $procurement->public_start_date . ' ~ ' . $procurement->public_end_date . '   ' . $procurement_name . '<br>' ;
                            $mail_body = $mail_body . $content;
                        }
                    }

                    $mail_body = $mail_body .'<br>' . $mail_footer;

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
