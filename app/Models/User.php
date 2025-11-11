<?php

namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, CanResetPassword;

    protected $table = 'users';
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'foto',
        'email',
        'password',
        'jabatan',
        'status',
    ];

    protected $hidden = [
        'password',
    ];
    
}
