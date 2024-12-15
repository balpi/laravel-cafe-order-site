<?php

namespace App\Http\Controllers\admin;

use App\Models\Comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use illuminate\Http\RedirectResponse;
use Carbon\Carbon;
use Str;

class CommentController extends Controller
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

            $categorylist = DB::table('comment')
                ->where('Title', 'LIKE', '%' . $search . '%')
                ->paginate($page, ['*'], 1);
        } else {
            $categorylist = DB::table('faqs')
                ->paginate($page, ['*'], 1);
        }



        return view('admin._tableComments', ['data' => $categorylist]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        try {
            $data = Comments::all()->firstOrFail()->toArray();
        } catch (\Throwable $th) {
            $data = ['Name', 'Error'];
        }

        return view('admin._commentFormAdd', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $creted = Comments::create(
            [
                'ID',
                'Question' => $request->Question,
                'Answer' => $request->Answer,
                'Status' => $request->Status,

                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]

        );


        return redirect('admin/comments/find/' . $creted->id . '/alert');

    }

    /**
     * Display the specified resource.
     */
    public function show(Comments $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comments $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function find($id, $alert = "")
    {

        $data = Comments::find($id)->toArray();


        return view('admin._commentsFormUpdate', ['data' => $data, 'alert' => $alert]);

    }
    public function update(Request $request): RedirectResponse
    {

        Comments::where('ID', $request->ID)
            ->update(
                [

                    'Question' => $request->Question,
                    'Answer' => $request->Answer,
                    'Status' => $request->Status,
                    'updated_at' => Carbon::now()
                ]

            );

        return redirect('admin/comments/find/' . $request->ID . '/alert');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comments $category, $id)
    {
        Comments::where('ID', '=', $id)->delete();
        return redirect('admin/comments/?alert=alertDel');
    }
}