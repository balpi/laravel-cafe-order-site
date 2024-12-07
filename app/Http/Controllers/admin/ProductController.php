<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Str;

class ProductController extends Controller
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

            $search = $request->search;

            $categorylist = Product::where('Title', 'LIKE', '%' . $search . '%')
                ->paginate($page, ['*'], 1);
        } else {
            $categorylist = DB::table('products')
                ->paginate($page, ['*'], 1);
        }



        return view('admin._tableProduct', ['data' => $categorylist]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Product::all()->firstOrFail()->toArray();

        return view('admin._productFormAdd', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        error_log($request);
        $creted = Product::create(
            [
                'ID',
                'Title' => $request->Title,
                'Keywords' => $request->Keywords,
                'Detail' => $request->Detail,
                'Description' => $request->Description,
                'Price' => $request->Price,
                'Category_ID' => $request->Category_ID,
                'User_ID ' => $request->User_ID,
                'Image' => $request->Image,
                'Status' => $request->Status,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]

        );


        return redirect('admin/product/find/' . $creted->id . '/alert');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }
    public function find($id, $alert = "")
    {
        error_log('ProductController_FIND');
        $data = Product::find($id)->toArray();

        return view('admin._productFormUpdate', ['data' => $data, 'alert' => $alert]);

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        Product::where('ID', $request->ID)
            ->update(
                [
                    'Title' => $request->Title,
                    'Keywords' => $request->Keywords,
                    'Description' => $request->Description,
                    'Category_ID' => $request->Category_ID,
                    'Image' => $request->Image,
                    'Status' => $request->Status,
                    'updated_at' => Carbon::now()
                ]

            );
        return redirect('admin/products/find/' . $request->ID . '/alert');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        Product::where('ID', '=', $id)->delete();
        return redirect('admin/product/?alert=alertDel');
    }
}
