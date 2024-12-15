<?php

namespace App\Http\Controllers\admin;


use App\Models\maincategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\StoreMainCategoryRequest;
use illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Redirect;
use Response;
use Str;
use View;

class MaincategoryController extends Controller
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

            $categorylist = DB::table('maincategories')
                ->where('Title', 'LIKE', '%' . $search . '%')
                ->paginate($page, ['*'], 1);
        } else {
            $categorylist = DB::table('maincategories')
                ->paginate($page, ['*'], 1);
        }



        return view('admin._tableMaincategory', ['data' => $categorylist]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = maincategory::all()->firstOrFail()->toArray();

        return view('admin._maincategoryFormAdd', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $creted = maincategory::create(
            [
                'ID',
                'Title' => $request->Title,
                'Description' => $request->Description,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]

        );


        return redirect('admin/maincategory/find/' . $creted->id . '/alert');
    }

    /**
     * Display the specified resource.
     */
    public function show(maincategory $maincategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function find($id, $alert = "")
    {


        error_log('FIND IS WORKING');
        $data = maincategory::find($id)->toArray();

        return view('admin._maincategoryFormUpdate', ['data' => $data, 'alert' => $alert]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, maincategory $maincategory)
    {
        maincategory::where('ID', $request->ID)
            ->update(
                [

                    'Title' => $request->Title,
                    'Description' => $request->Description,
                    'updated_at' => Carbon::now()
                ]

            );
        return redirect('admin/maincategory/find/' . $request->ID . '/alert');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(maincategory $maincategory, $id)
    {
        maincategory::where('ID', '=', $id)->delete();
        return redirect('admin/maincategory/?alert=alertDel');
    }
}
