<?php

namespace App\Http\Controllers\admin;

use App\Models\Faqs;
use App\Http\Requests\StoreFaqsRequest;
use App\Http\Requests\UpdateFaqsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use illuminate\Http\RedirectResponse;
use Carbon\Carbon;
use Str;

class FaqsController extends Controller
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

            $categorylist = DB::table('faqs')
                ->where('Title', 'LIKE', '%' . $search . '%')
                ->paginate($page, ['*'], 1);
        } else {
            $categorylist = DB::table('faqs')
                ->paginate($page, ['*'], 1);
        }



        return view('admin.faqs._tableFaqs', ['data' => $categorylist]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        try {
            $data = Faqs::all()->firstOrFail()->toArray();
        } catch (\Throwable $th) {
            $data = ['Name', 'Error'];
        }

        return view('admin.faqs._faqFormAdd', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $creted = Faqs::create(
            [
                'ID',
                'Question' => $request->Question,
                'Answer' => $request->Answer,
                'Status' => $request->Status,

                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]

        );


        return redirect('admin/category/find/' . $creted->id . '/alert');

    }

    /**
     * Display the specified resource.
     */
    public function show(Faqs $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faqs $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function find($id, $alert = "")
    {

        $data = Faqs::find($id)->toArray();


        return view('admin.faqs._categoryFormUpdate', ['data' => $data, 'alert' => $alert]);

    }
    public function update(Request $request): RedirectResponse
    {

        Faqs::where('ID', $request->ID)
            ->update(
                [

                    'Question' => $request->Question,
                    'Answer' => $request->Answer,
                    'Status' => $request->Status,
                    'updated_at' => Carbon::now()
                ]

            );

        return redirect('admin/faq/find/' . $request->ID . '/alert');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faqs $category, $id)
    {
        Faqs::where('ID', '=', $id)->delete();
        return redirect('admin/faq/?alert=alertDel');
    }
}