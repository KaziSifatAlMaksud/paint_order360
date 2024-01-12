<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcustomer extends Model
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
    ];
}
