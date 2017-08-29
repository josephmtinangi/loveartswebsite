<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showSendResetEmailForm()
    {
        return view('admin.auth.passwords.email');
    }

    public function sendResetEmail(Request $request)
    {
        //
    }

    public function showResetForm(Request $request)
    {
        return view('admin.auth.passwords.reset', [
            'token' => $request->token,
        ]);
    }

    public function reset(Request $request)
    {
        //
    }
}
