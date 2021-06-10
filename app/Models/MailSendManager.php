<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailSendManager extends Model
{
    use HasFactory;
    protected $fillable = [
        'search_period',
        'send_start_time',
        'send_per_hour',
        'send_status',
        'mail_header',
        'mail_footer',

    ];
}
