<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllowNotification extends Model
{
    use HasFactory;
     protected $table = 'allow_notification';
      protected $fillable = [
        'user_id',
        'device_token',
        'status'
    ];


     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
