<?php

namespace App\Http\Controllers\admin;
use App\Http\Requests\StoreProductRequest;
use App\Models\Comments;
use App\Models\Messages;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Slider;
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

        $messages = Messages::all();
        $comments = Comments::where('Status', '=', 'pending')->get();
        $orders = Orders::where('Status', '=', 'pending')->get();
        $user = User::with('roles')->orderBy('created_at', 'desc')->get()->take(10);
        return view("admin.index", [
            'messages' => $messages,
            'comments' => $comments,
            'orders' => $orders,
            'users' => $user
        ]);
    }
    public function LoginCheck(Request $request): \Symfony\Component\HttpFoundation\RedirectResponse
    {



        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('/home')->with('useremail', session('email'));
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
    public function sliderControl()
    {
        $data = Product::paginate(10);
        $sliders = Slider::with('Product')->get();

        foreach ($sliders as $key => $value) {
            error_log('-------->' . $value->Product->Title . "=>");
        }
        return view('admin._slider', ['data' => $data, 'sliders' => $sliders]);
    }
    public function sliderAdd($id)
    {



        error_log('-------->' . $id . "=>");

        $product = Product::find($id);
        $slider = new Slider();

        $slider->Product_ID = $product->ID;
        $slider->Title = $product->Title;
        $slider->Description = $product->Description;
        $slider->updated_at = Carbon::now();
        $slider->created_at = Carbon::now();
        $slider->save();

        return redirect()->route('admin_slider');
    }
    public function sliderDelete($id)
    {
        Slider::where('id', '=', $id)->delete();
        return redirect()->route('admin_slider');
    }
    public function sliderUpdate(Request $request)
    {
        $slider = Slider::find($request->ID);
        $slider->Title = $request->Title;
        $slider->Description = $request->Description;
        $slider->updated_at = Carbon::now();
        $slider->save();
        return redirect()->route('admin_slider');
    }

}
