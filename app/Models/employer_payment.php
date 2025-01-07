<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employer_payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'plan_id',
        'payment_id',
        'payment_amount',
        'is_deleted',
        'created_at',
    ];
}