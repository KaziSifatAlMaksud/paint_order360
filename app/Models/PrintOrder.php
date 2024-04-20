<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintOrder extends Model
{
    use HasFactory;
    protected $table = 'print_order';
    protected $fillable = [
        'painter_id',
        'painter_address',
        'painter_longitude',
        'painter_latitude',
        'job_address',
        'job_longitude',
        'job_latitude',
        'brand_id',
        'date',
        'kit_status',
        'status'
    ];
}
