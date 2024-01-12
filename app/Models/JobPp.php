<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPp extends Model
{
    protected $table = 'job_pp';

    protected $fillable = [
        'job_id',
        'image',
        'order',
    ];
}
