<?php

namespace App\Admin;

use App\Admin\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The guard associated with the model.
     *
     * @var string
     */
    protected $guard = 'admin';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token'
    ];

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Returns the admin avatar.
     *
     * @return string
     */
    public function getAvatarAttribute()
    {
        return asset('images/avatar.jpg');
    }
}
