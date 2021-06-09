<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'search_type',
        'search_classify',
        'search_agency',
        'search_address',
        'search_item_classify',
        'search_name',
        'search_public_id',
        'search_official_text',
        'search_per_page',
        'search_grade',
        'search_no_grade'
    ];
}
