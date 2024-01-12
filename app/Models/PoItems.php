<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoItems extends Model
{


    use HasFactory;
    protected $table = 'po_items';
    public $fillable = [
        "job_id",
        "batch",
        "ponumber",
        "description",
        "job_details",
        "invoice_id",
        "file",
        "price"
    ];


    public function painterJob()
    {
        return $this->belongsTo(PainterJob::class, 'job_id');
    }
}
