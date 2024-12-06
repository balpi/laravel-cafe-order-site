<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Http\Requests\StoreCategoryRequest;
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
            error_log($request->search);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
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

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
