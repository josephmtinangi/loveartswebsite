<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Role;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.roles.index', [
            'route_title' => trans('admin_roles.title'),
            'route_description' => trans('admin_roles.description'),
            'roles' => Role::all(),
        ]);
    }
}
