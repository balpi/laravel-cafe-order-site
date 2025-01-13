<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreMessagesRequest;
use App\Models\Category;
use App\Models\Chefs;
use App\Models\Comments;
use App\Models\Faqs;
use App\Models\Messages;
use App\Models\Product;
use App\Models\Settings;
use App\Models\Slider;
use Arr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Settings::first();
        $categories = Category::all();
        $product = Chefs::with('product')->get();
        $sliders = Slider::with('product')->get();
        if ((!$setting)) {

            $setting = new Settings();
            $setting->Title = 'Project Title';
            $setting->created_at = Carbon::now();
            $setting->save();
            $setting = Settings::first();
        }
        return view("home.index", [
            'setting' => $setting,
            'categories' => $categories,
            'products' => $product,
            'sliders' => $sliders
        ]);
    }
    public function addCart(Request $request)
    {

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                "id" => $product->ID,
                "name" => $product->Title,
                "quantity" => $quantity,
                "price" => $product->Price,
                "image" => $product->Image
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function sendMessage(StoreMessagesRequest $request)
    {
        $creted = Messages::create(
            [

                'ID',
                'Name' => $request->Name,
                'Email' => $request->Email,
                'Phone' => $request->Phone,
                'Subject' => $request->Subject,
                'Message' => $request->Message,
                'Status' => 'Pending',
                'IP' => $request->ip(),

                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]

        );
        return redirect()->route('contact')
            ->with('success', 'Thanks for your messages. We will be in touch');
    }
    public function contact()
    {
        $setting = Settings::first();
        return view('home._contact', ['setting' => $setting]);
    }
    public function about()
    {
        $setting = Settings::first();
        return view('home._about', ['setting' => $setting]);
    }
    public function shop()
    {
        $product = Product::all();
        return view('home.shop', ['products' => $product]);
    }
    public function product($id)
    {
        $setting = Settings::first();
        $product = Product::find($id);
        $similarProducts = Product::where('Category_ID', $product->Category_ID)->where('ID', '<>', $product->ID)->get();
        $comments = Comments::where('product_ID', $product->ID)->where('Status', '=', 'approved')
            ->get();
        return view('home._productDetail', [
            'product' => $product,
            'setting' => $setting,
            'similarProducts' => $similarProducts,
            'comments' => $comments
        ]);
    }
    public function getProduct(Request $request)
    {

        $search = request()->input('search');
        $product = Product::where('Title', 'like', '%' . $search . '%')->get();

        $setting = Settings::first();


        if ($product->count() < 2) {
            $product = $product->firstOrFail();
            $comments = Comments::where('product_ID', $product->ID)
                ->where('Status', '=', 'approved')->get();

            return redirect()->route('detail', ['id' => $product->ID, 'comments' => $comments, 'setting' => $setting]);
        } else {
            return view('home._getProducts', ['products' => $product, 'setting' => $setting]);
        }

    }
    public function procuctsforCategory($categoryID)
    {
        $product = Product::where('Category_ID', $categoryID)->get();
        $categories = Category::all();
        $setting = Settings::first();
        return view('home._getProducts', [
            'products' => $product,
            'setting' => $setting,
            'categories' => $categories
        ]);
    }
    public function faqs()
    {
        $faqs = Faqs::all();
        $setting = Settings::first();
        return view('home._faqs', ['faqs' => $faqs, 'setting' => $setting]);
    }

    public function getSettings()
    {
        return Settings::first();
    }
    public function showCart()
    {
        $cart = session()->get('cart');
        $setting = Settings::first();
        return view('home._mycart', ['cart' => $cart, 'setting' => $setting]);

    }
    public function removeCartItem($id)
    {
        if ($id) {

            $cart = session()->get('cart');

            if (isset($cart[$id])) {

                unset($cart[$id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
            return redirect(route('showcart'));
        }
    }
    public function addComment(Request $request)
    {

        $ratings = Comments::where('user_ID', auth()->user()->id)
            ->where('product_ID', $request->Product_ID)
            ->where('Status', '<>', 'rejected')
            ->get();
        if ($ratings->count() > 0) {
            return redirect()->back()->with('error', 'You have already rated this product');
        }


        $ratings = new Comments();
        $ratings->user_ID = auth()->user()->id;
        $ratings->product_ID = $request->Product_ID;
        $ratings->rate = $request->rate;
        $ratings->comment = $request->comment;
        $ratings->Status = 'pending';
        $ratings->created_at = Carbon::now();
        $ratings->updated_at = Carbon::now();
        $ratings->ip = $request->ip();
        try {

            $ratings->save();
        } catch (\Throwable $th) {

            throw $th;
        }
        $this->hideForm = true;
        /*  } */
        return redirect()->back();
    }
}
