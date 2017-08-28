<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\SystemUser;
use Illuminate\Http\Request;

class SystemUserController extends Controller
{
    public function index()
    {
        return view('admin.system_users.index', [
            'route_title' => 'System Users',
            'route_description' => 'A list of all system users',
            'system_users' => SystemUser::all(),
        ]);
    }
}
