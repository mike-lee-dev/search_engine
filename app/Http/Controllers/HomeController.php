<?php

namespace App\Http\Controllers;

use App\Models\ProcurementInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            $query = $query . ")";
        }

        $query = $query . " public_start_date >= '" . $public_start_date_from . "'" . " AND public_start_date <= '" . $public_start_date_to . "'"
            . " AND public_end_date >= '" . $public_end_date_from . "'" . " AND public_end_date <= '" . $public_end_date_to . "'"
            . " AND procurement_name LIKE '%" . $name . "%'"
            . " AND official_text LIKE '%" . $official_text . "%'"
            . " AND public_id LIKE '%" . $public_id . "%'";


        $procurements = DB::select($query);

        $result = array_slice($procurements, 0, $per_page);
        $result_cnt = count($result);
        return view('user.result', [
            'procurements' => $result,
            'cnt' => $result_cnt,
            'searchCon' => $searchCon,
        ]);
    }
    public function mailSetting()
    {
        return view('user.mail-setting');
    }
    public function result()
    {
        return view('user.result');
    }
    public function detail($id)
    {
        return view('user.detail');
    }
}
