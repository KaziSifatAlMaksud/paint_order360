<?php

namespace App\Models;

use App\Models\BuilderModel;
use App\Models\PainterJob;
use App\Models\Superviser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AssignedPainterJob extends Model
{
    use HasFactory;
    protected $table = 'assigned_painter_job';
    protected $fillable = [
        'assigned_painter_name',
        'assign_company_id',
        'assigned_supervisor',
        'user_id',
        'job_id',
        'assign_job_description',
        'assign_price_job',
        'paint_cost',
        'status',
        'Q_1',
        'Q_2',
        'Q_3',
    ];

    public function adminBuilder()
    {
        return $this->belongsTo(BuilderModel::class, 'assign_company_id');
    }
    public function painterJob()
    {
        return $this->belongsTo(PainterJob::class, 'job_id');
    }
    public function painter()
    {
        return $this->belongsTo(User::class, 'assigned_painter_name');
    }
    public function superviser()
    {
        return $this->belongsTo(Superviser::class, 'assigned_supervisor');
    }
}
