<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    public $fillable = [
        "status",
        "account_no",
        'brand_id',
        'user_id',

    ];

    /**
     * Get the brand for the Account.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
