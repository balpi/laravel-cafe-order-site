<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Product;
use Illuminate\Support\Carbon;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {

        $data = Product::find($id);
        $dataImage = Image::where('Products_ID', '=', $id)->get();


        return view('admin._imagesFormAdd', [
            'data' => $data,
            'dataImage' => $dataImage
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImageRequest $request)
    {
        $mes = "";
        $req = $request->except('_token');
        foreach ($req as $id => $value) {
            $mes .= $id . "-----> " . $value . "      ";
        }
        error_log('BURADAYIZ ŞİMDİ' . $mes);
        if ($request->AddingPage) {
            $CImage = $request->file('Image')->store('storage/Images');
        } else {
            $CImage = $request->Image;
        }

        $created = Image::create(
            [
                'ID',
                'Title' => $request->Title,
                'Image' => $CImage,
                'Products_ID' => $request->Product_ID,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]
        );
        return redirect(route('admin_images_add', ['id' => $request->Product_ID]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, $pid)
    {

        error_log('BURADAYIZ ŞİMDİ' . $id);

        Image::where('ID', '=', $id)->delete();
        return redirect('admin/images/add/' . $pid . '?alert=alertDel');
    }
}
