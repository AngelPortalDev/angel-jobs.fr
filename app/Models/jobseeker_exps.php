<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobseeker_exps extends Model
{
    use HasFactory;
    protected $fillable = [
        'js_id',
        'company_name',
        'work_industry_id',
        'work_desination_id',
        'joining_date',
        'ending_date',
        'is_deleted',
    ];
}
