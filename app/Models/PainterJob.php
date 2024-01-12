<?php

namespace App\Models;

use App\Models\PjItem;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PainterJob extends Model
{
    use HasFactory;

    public $fillable = [
        'order_id',
        'title',
        'address',
        'start_date',
        'received_date',
        'stairs_stained',
        'cladding',
        'render',
        'status',
        'latitude',
        'longitude',
        'user_id',
        'shop_id',
        'builder_id',
        'plan',
        'colors',
        'po',
        'area',
        'price',
        'house_size',
        'parent_id',
        'value',
        'index',
        'key',
        'brand_id',
        'company_id',
        'supervisor_id',
        'supervisor_id',
        'colors_secound',
        'colors_spec',
        'plan_granny',
        'builder_company_name'
    ];

    public $outside = [];

    public $inside = [];
    public function __construct()
    {
        App::setLocale(session()->get('locale'), 'en');
        $this->inside = [
            'ceilings' => __('message.ceilings'),
            'walls' =>  __('message.walls'),
            'wall_undercoat' => __('message.wall_undercoat'),
            'woodwork_colour' => __('message.woodwork_colour'),
            'woodwork_undercoat' => __('message.woodwork_undercoat'),
            'feature_room1' => __('message.feature_room1'),
            'feature_room2' => __('message.feature_room2'),
            '1st_feature_wall' => __('message.1st_feature_wall'),
            '2st_feature_wall' => __('message.2st_feature_wall'),
            '3st_feature_wall' => __('message.3st_feature_wall'),
            'stringer' => __('message.stringer'),
            'handrail' => __('message.handrail'),
            'post' => __('message.post'),
            'other' => __('message.other'),
        ];
        $this->outside = [
            'eaves' => __('message.eaves'),
            'downpipes' => __('message.downpipes'),
            'meter_box' => __('message.meter_box'),
            'front_door' =>  __('message.front_door'),
            'laundry_door' =>  __('message.laundry_door'),
            'balcony_door' =>  __('message.balcony_door'),
            'main_render' => __('message.main_render'),
            'render_2' =>  __('message.render_2'),
            'render_3' =>  __('message.render_3'),
            'cladding_2' => __('message.cladding_2'),
            'cladding_3' => __('message.cladding_3'),
        ];
    }

    /**
     * Get the items for the job.
     */

    public function items()
    {
        return $this->hasMany(PjItem::class, 'job_id');
    }

    public function outside()
    {
        return $this->hasMany(PjItem::class, 'job_id')->where('type', 'outside');
    }

    public function inside()
    {
        return $this->hasMany(PjItem::class, 'job_id')->where('type', 'inside');
    }

    public function superviser()
    {
        return $this->belongsTo('App\Models\Superviser', 'supervisor_id');
    }

    /**
     * Get the items for the job.
     */
    public function GallaryPlan()
    {
        return $this->hasMany(GallaryPlan::class, 'job_id');
    }
    /**
     * Get the painter for the job.
     */
    public function painter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function admin_builders()
    {
        return $this->belongsTo(BuilderModel::class, 'builder_id');
    }
    // public function Builder()
    // {
    //     return $this->belongsTo(BuilderModel::class, 'builder_id');
    // }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * Get the items for the job.
     */
    public function poitem()
    {
        return $this->hasOne(PoItems::class, 'job_id');
    }
    public function poItems()
    {
        return $this->hasMany(PoItems::class, 'job_id');
    }
    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }
}
