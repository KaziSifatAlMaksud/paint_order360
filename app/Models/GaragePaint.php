<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GaragePaint extends Model
{
    protected $table = 'garage_paint';
    use HasFactory;
    protected $fillable = [
        'brand_id',
        'area_outside',
        'area_inside',
        'color',
        'product',
        'size',
        'quantity',
        'notes',
        'user_id',
        'job_id',
        'shop_type',
    ];
}
