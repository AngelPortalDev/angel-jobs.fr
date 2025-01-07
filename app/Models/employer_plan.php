<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\{DB, Session};

class employer_plan extends Model
{
    use HasFactory;
    public $table = "employer_plan";
    protected $fillable = [
        'status',
        'type',
        'plan_name',
        'plan_type',
        'plan_currency',
        'plan_amount',
        'plan_duration',
        'plan_offers',
        'job_post_limit',
        'cv_access_limit',
        'message',
        'highlight_job_limit',
        'contacts',
        'job_life',
        'created_on',
        'is_deleted'
    ];

    public function planDetails($plan_id, $select)
    {
        $planDetails = DB::table('employer_plan')->select($select)->where('id', $plan_id)->where('is_deleted', 'No')->get();
        return $planDetails;
    }
}