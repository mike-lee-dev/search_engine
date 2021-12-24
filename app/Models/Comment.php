<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'procurement_id',
        'manage_comment_id',
        'period_1',
        'period_2',
        'period_3',
        'period_4',
        'period_5',
        'tantosha_name',
        'comment',
        'description_2',
        'description_3',
        'description_4',
        'description_5',
    ];
}
