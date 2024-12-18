<?php

namespace App\Http\Controllers\admin;
use App\Models\Comments;
use App\Models\Messages;
use App\Models\Orders;
use Carbon\Carbon;
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
        $user = Auth::user();

        $messages = Messages::where('updated_at', '>', $user->last_logged);
        $comments = Comments::where('updated_at', '>', $user->last_logged);
        $orders = Orders::where('updated_at', '>', $user->last_logged);

        return view("admin.index", ['messages' => $messages, 'comments' => $comments, 'orders' => $orders]);
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
        User::where('id', '=', Auth::user()->id)->update(
            [
                'last_logged' => Carbon::now()
            ]
        );
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/home');
    }


}
