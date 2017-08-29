<?php

namespace App\Http\Controllers\Admin;

use App\Admin\User;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'route_title' => 'System Users',
            'route_description' => 'A list of all system users',
            'users' => User::orderBy('name', 'asc')->paginate(),
        ]);
    }
}
