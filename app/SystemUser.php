<?php

namespace App;

use Silber\Bouncer\Database\HasRolesAndAbilities;
use Illuminate\Database\Eloquent\Model;

class SystemUser extends Model
{
    use HasRolesAndAbilities;
}
