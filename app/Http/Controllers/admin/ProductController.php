<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\StoreImageRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use App\Models\Product;
use App\Models\User;
use App\Http\Requests\StoreProductRequest;
use illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Redirect;
use Schema;
use Storage;
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

            $categorylist = Product::paginate($page, ['*'], 1);

        }



        return view('admin.product._tableProduct', ['data' => $categorylist]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Product::first();
        if ($data == null) {
            $data = DB::getSchemaBuilder()->getColumnListing('products');
            $data = array_fill_keys($data, "");
        } else {
            $data = $data->toArray();
        }
        $dataCategory = Category::all();
        $dataUser = User::all();
        return view('admin.product._productFormAdd', [
            'data' => $data,
            'dataCategory' => $dataCategory,
            'dataUser' => $dataUser
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $created = Product::create(
            [
                'ID',
                'Title' => $request->Title,
                'Keywords' => $request->Keywords,
                'Detail' => $request->Detail,
                'Description' => $request->Description,
                'Price' => $request->Price,
                'Category_ID' => $request->Category_ID,
                'User_ID' => $request->User_ID,
                'Image' => $request->file('Image')->store('storage/Images'),
                'Status' => $request->Status,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]

        );

        $imagerequest = new StoreImageRequest();
        $imagerequest->Title = $created->Title . " product Main Photo";
        $imagerequest->Image = $created->Image;
        $imagerequest->Product_ID = $created->id;



        app()->call('App\Http\Controllers\admin\ImageController@store', [
            "request" => $imagerequest
        ]);


        return redirect('admin/product/find/' . $created->id . '/alert');
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

        $data = Product::where('ID', '=', $id)->first()->toArray();
        $dataCategory = Category::all();
        $dataUser = User::all();
        return view('admin.product._productFormUpdate', [
            'data' => $data,
            'dataCategory' => $dataCategory,
            'dataUser' => $dataUser
        ]);



    }
    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request)
    {
        $image = "";
        if ($request->hasFile('Image')) {
            $image = $request->file('Image')->store('storage/Images');
        } else {
            $product = Product::where('ID', $request->ID)->first();
            $image = $product->Image;
        }

        Product::where('ID', $request->ID)
            ->update(
                [
                    'Title' => $request->Title,
                    'Keywords' => $request->Keywords,
                    'Detail' => $request->Detail,
                    'Description' => $request->Description,
                    'Category_ID' => $request->Category_ID,
                    'User_ID' => $request->User_ID,
                    'Image' => $image,

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
