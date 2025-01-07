<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobseeker_education extends Model
{
    use HasFactory;
    protected $fillable = [
        'js_id',
        'institute_name',
        'degree_id',
        'professional_title',
        'specilization',
        'passing_year',
        'is_deleted',
    ];
}
