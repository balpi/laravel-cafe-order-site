<?php

namespace App\Http\Controllers\admin;

use App\Models\Orders;
use App\Http\Requests\StoreOrdersRequest;
use App\Http\Requests\UpdateOrdersRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use illuminate\Http\RedirectResponse;
use Carbon\Carbon;
use Str;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        if ($request->has('items')) {
            $page = $request->items;

        } else {
            $page = 10;
        }
        $search = "";
        if ($request->has('search') and Str::length($request->search) > 1) {
            error_log($request->search);
            $search = $request->search;

            $categorylist = Orders::where('Title', 'LIKE', '%' . $search . '%')
                ->orderBy(DB::raw('case when Status= "pending" then 1 when Status= "approved" then 2 when Status= "rejected" then 3 end'))
                ->orderBy('created_at', 'desc')
                ->paginate($page, ['*'], 1);
        } else {
            $categorylist = Orders::orderBy(DB::raw('case when Status= "pending" then 1 when Status= "approved" then 2 when Status= "rejected" then 3 end'))
                ->orderBy('created_at', 'desc')
                ->paginate($page, ['*'], 1);
        }



        return view('admin.order._tableOrders', ['data' => $categorylist]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        try {
            $data = Orders::all()->firstOrFail()->toArray();
        } catch (\Throwable $th) {
            $data = ['Name', 'Error'];
        }

        return view('admin.order._orderFormAdd', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $creted = Orders::create(
            [
                'Title' => $request->Title,
                'Keywords' => $request->Keywords,
                'Description' => $request->Description,
                'Category_ID' => $request->Category_ID,
                'Image' => $request->Image,
                'Status' => $request->Status,
                'created_at' => $request->created_at,
                'updated_at' => $request->updated_at
            ]

        );


        return redirect('admin/orders/find/' . $creted->id . '/alert');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $orders = Orders::where('ID', $id)
            ->with('Orders_Product')->with('Orders_Product.product')
            ->orderBy('created_at', 'desc')
            ->first()
        ;



        return view('admin.order._orderDetails', ['order' => $orders]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function find($id, $alert = "")
    {

        $data = Orders::find($id)->toArray();


        return view('admin.order._orderFormUpdate', ['data' => $data, 'alert' => $alert]);

    }
    public function update($id)
    {

        error_log('----->ID BUDUR' . $id);
        Orders::where('ID', $id)
            ->update(
                [

                    'Status' => 'approved',
                    'updated_at' => Carbon::now()
                ]

            );

        return redirect(route('admin_orders_find', ['id' => $id, 'alert' => 'alertUp']));


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $category, $id)
    {
        Orders::where('ID', '=', $id)->delete();
        return redirect('admin/orders/?alert=alertDel');
    }
}