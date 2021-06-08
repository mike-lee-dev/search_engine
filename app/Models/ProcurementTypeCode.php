<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcurementTypeCode extends Model
{
    use HasFactory;
    protected $fillable = [
        'procurement_type'
    ];
}
