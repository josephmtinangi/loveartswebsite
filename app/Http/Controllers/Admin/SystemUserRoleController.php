<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use Silber\Bouncer\Database\Role;

class SystemUserRoleController extends Controller
{
    public function index()
    {
        return view('admin.system_users.roles.index', [
            'route_title' => 'System Roles',
            'route_description' => 'List of available system roles',
            'system_roles' => Role::all(),
        ]);
    }
}
