<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view("admin.index");
    }
    public function LoginCheck(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
