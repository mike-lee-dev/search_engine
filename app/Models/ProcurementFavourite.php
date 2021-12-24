<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProcurementFavourite extends Model
{
    use HasFactory;
    protected $fillable = [
        'procurement_id',
        'user_id',
        'rate'
    ];
    public function comment(){
        return $this->hasMany(Comment::class, 'procurement_id', 'procurement_id')->where('user_id', Auth::user()->id);
    }
}
