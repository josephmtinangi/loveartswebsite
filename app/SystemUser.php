<?php

namespace App;

use Silber\Bouncer\Database\HasRolesAndAbilities;
use Illuminate\Database\Eloquent\Model;

class SystemUser extends Model
{
    use HasRolesAndAbilities;

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
}
