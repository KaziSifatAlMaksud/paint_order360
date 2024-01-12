<?php

namespace App\Models;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PjItem extends Model
{
    use HasFactory;
    protected $table = 'p_job_items';
    public $fillable = [
        "product",
        "color",
        "size",
        "qty",
        'job_id',
        'type',
        'brand_id',
        'brand_id',
        'note',
        'key',
        'area'
    ];
    public $sizes = [
        '1' => '15 L',
        '2' => '10 L',
        '3' => '4 L',
        '4' => '2 L',
        '5' => '1 L',
        '101' => 'Select',
        '101' => 'None',
        '102' => 'Call Me',
    ];
    /**
     * Get the brand for the job.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
