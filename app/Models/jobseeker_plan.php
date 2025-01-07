<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\{DB};

class jobseeker_plan extends Model
{
    use HasFactory;
    public $table = "jobseeker_plan";
    protected $fillable = [
        'status',
        'type',
        'plan_name',
        'plan_type',
        'plan_currency',
        'plan_amount',
        'plan_duration',
        'plan_offers',
        'highlight_job_limit',
        'created_at',
        'is_deleted'
    ];

    public function planDetails($plan_id, $select)
    {
        $planDetails = DB::table('jobseeker_plan')->select($select)->where('id', $plan_id)->where('is_deleted', 'No')->get();
        return $planDetails;
    }
}