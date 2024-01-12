<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Superviser extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'email', 
        'phone', 
        'builder_id', 
    ];
    
    protected $table = 'supervisers';

    public function builder(): BelongsTo
    {
        return $this->belongsTo(BuilderModel::class, 'builder_id');
    }
    public function jobs()
    {
        return $this->hasMany('App\Models\PainterJob', 'supervisor_id');
    }
    

}
