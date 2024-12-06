<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Str;



class CategoryController extends Controller
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

            $categorylist = DB::table('categories')
                ->where('Title', 'LIKE', '%' . $search . '%')
                ->paginate($page, ['*'], 1);
        } else {
            $categorylist = DB::table('categories')
                ->paginate($page, ['*'], 1);
        }



        return view('admin._tableCategory', ['data' => $categorylist]);
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
    public function store(StoreCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function find($id, $alert = "")
    {
        error_log($id . '---serhat  -' . $alert);
        $data = Category::find($id)->toArray();


        return view('admin._categoryForm', ['data' => $data, 'alert' => $alert]);

    }
    public function update(Request $request): RedirectResponse
    {




        Category::where('ID', $request->ID)
            ->update(
                [
                    'Title' => $request->Title,
                    'Keywords' => $request->Keywords,
                    'Description' => $request->Description,
                    'Image' => $request->Image,
                    'Status' => $request->Status,
                    'updated_at' => Carbon::now()
                ]

            );
        return redirect('admin/category/find/' . $request->ID . '/alert');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, $id)
    {
        Category::where('ID', '=', $id)->delete();
        return redirect('admin/category/?alert=alertDel');
    }
}
