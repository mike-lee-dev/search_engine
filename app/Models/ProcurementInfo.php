<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcurementInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'public_id',
        'serial_number',
        'classify_code',
        'notification_class',
        'procurement_agency',
        'address',
        'public_start_date',
        'public_end_date',
        'bid_accept_date',
        'modify_classify',
        'type',
        'change_noti_id',
        'item_category_1',
        'item_category_2',
        'item_category_3',
        'item_category_4',
        'item_category_5',
        'item_category_6',
        'item_category_7',
        'item_category_8',
        'procurement_name',
        'en_procurement_name',
        'url_specification_1',
        'url_specification_2',
        'url_specification_3',
        'url_specification_4',
        'url_specification_5',
        'official_text',
        'a_grade',
        'b_grade',
        'c_grade',
        'd_grade',
        'abcd_grade',
        'abc_grade',
        'ab_grade',
        'bcd_grade',
        'bc_grade',
        'cd_grade',
        'no_grade'
    ];
}
