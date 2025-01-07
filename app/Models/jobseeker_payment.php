<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\{Auth, Redirect, Validator, Storage,Crypt,App};
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class jobseeker_payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'js_id',
        'plan_id',
        'payment_id',
        'payment_amount',
        'is_deleted',
        'created_at',
    ];

  
}