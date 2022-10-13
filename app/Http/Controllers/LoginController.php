<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }
    public function check(Request $request)
    {
        $check = $request->only('password', 'account');

        if (Auth::attempt($check)) {
            $request->session()->regenerate();

            return redirect(route('admin'));
        }
        return back()->withErrors(['message' => 'アカウントまたはパスワードが正しくありません']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route('login'));
    }
}
