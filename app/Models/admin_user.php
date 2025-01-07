<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_user extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'email',
        'email_verified',
        'mob_code',
        'mobile',
        'reset_token',
        'password',
        'created_at'
    ];
}
