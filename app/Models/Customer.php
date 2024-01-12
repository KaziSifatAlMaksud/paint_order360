<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'companyName',
        'name',
        'email',
        'mobile',
        'MobileOthers',
        'abn',
        'billingAddress',
        'user_id',
        'state',
        'schedule',
        'gst',
    ];
}
