<?php

namespace App\Admin;

use App\Admin\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'admin_users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getAvatarAttribute()
    {
        return asset('images/avatar.jpg');
    }
}
