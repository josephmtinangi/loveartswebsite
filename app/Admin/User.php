<?php

namespace App\Admin;

use App\Admin\CanResetPassword;
use App\Admin\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use CanResetPassword, Notifiable;

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
