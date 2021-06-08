<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcurementAgencyCode extends Model
{
    use HasFactory;
    protected $fillable = [
        'procurement_agency'
    ];
}
