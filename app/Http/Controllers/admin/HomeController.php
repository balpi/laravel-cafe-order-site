<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use phpDocumentor\Reflection\Types\Nullable;
use Symfony\Component\HttpKernel\Log\DebugLoggerConfigurator;
class HomeController extends Controller
{
    public function index()
    {
        return view("admin.index");
    }
    public function LoginCheck(Request $request): \Symfony\Component\HttpFoundation\RedirectResponse
    {



        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('/admin')->with('useremail', session('email'));
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        } else {

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/home');
    }


}
