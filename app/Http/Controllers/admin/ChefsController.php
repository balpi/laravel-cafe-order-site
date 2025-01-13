<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Chefs;
use App\Http\Requests\UpdateChefsRequest;
use App\Models\Product;
use Carbon\Carbon;

class ChefsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::paginate(10);
        $sliders = Chefs::with('Product')->get();

        return view('admin._chefs', ['data' => $data, 'Chefs' => $sliders]);
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
    public function store($id)
    {
        $product = Product::find($id);
        $slider = new Chefs();

        $slider->Product_ID = $product->ID;
        $slider->Title = $product->Title;
        $slider->Description = $product->Description;
        $slider->updated_at = Carbon::now();
        $slider->created_at = Carbon::now();
        $slider->save();

        return redirect()->route('admin_chefs');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chefs $chefs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chefs $chefs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChefsRequest $request)
    {
        $slider = Chefs::find($request->ID);
        $slider->Title = $request->Title;
        $slider->Description = $request->Description;
        $slider->updated_at = Carbon::now();
        $slider->save();
        return redirect()->route('admin_chefs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Chefs::where('id', '=', $id)->delete();
        return redirect()->route('admin_chefs');
    }
}
