<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Orders_Product;
use App\Models\Product;
use App\Models\Settings;
use Auth;
use DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Orders::where('User_ID', Auth::user()->id)
            ->with('Orders_Product')->with('Orders_Product.product')->orderBy('created_at', 'desc')
            ->get()
        ;
        $setting = Settings::first();


        return view('home._userOrders', ['setting' => $setting, 'orders' => $orders]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = DB::getSchemaBuilder()->getColumnListing('orders');
        $data = array_fill_keys($data, "");
        $setting = Settings::first();
        $cart = session()->get('cart');
        return view('home._OrdersAdd', ['setting' => $setting, 'data' => $data, 'cart' => $cart]);
    }
    public function orderDirect($id)
    {
        $productId = $id;
        $quantity = 1;
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
        return redirect(route('order_add'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            error_log($key . " => " . $value);
        }

        $order = Orders::create([
            'User_ID' => Auth::user()->id,
            'Total' => $request->Total,
            'Status' => "pending",
            'Note' => $request->Note,
            'TableNo' => $request->TableNo,
            'IP' => Request()->ip(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $cart = session()->get('cart');
        foreach ($cart as $item => $value) {
            Orders_Product::create([
                'Order_ID' => $order->id,
                'User_ID' => $order->User_ID,
                'Product_ID' => $item,
                'Amount' => $value['quantity'],
                'Price' => $value['price'],
                'Total' => $value['price'] * $value['quantity'],
                'Note' => $request->Note,
                'Status' => "pending",
                'IP' => Request()->ip(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        session()->forget('cart');
        return redirect(route('orders'))->with('success', 'Order has been placed successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
