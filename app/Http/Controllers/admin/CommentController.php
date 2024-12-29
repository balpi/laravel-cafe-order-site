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

            $categorylist = Comments::with('product')
                ->where('Title', 'LIKE', '%' . $search . '%')
                ->orderBy(DB::raw('case when Status= "pending" then 1 when Status= "approved" then 2 when Status= "rejected" then 3 end'))
                ->orderBy('created_at', 'desc')
                ->paginate($page, ['*'], 1);
        } else {
            $categorylist = Comments::with('product')
                ->orderBy(DB::raw('case when Status= "pending" then 1 when Status= "approved" then 2 when Status= "rejected" then 3 end'))
                ->orderBy('created_at', 'desc')
                ->paginate($page, ['*'], 1);
        }



        return view('admin.comment._tableComments', ['data' => $categorylist]);
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

        return view('admin.comment._commentFormAdd', ['data' => $data]);
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


        return redirect('admin/comment/find/' . $creted->id . '/alert');

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


        return view('admin.comment._commentFormUpdate', ['data' => $data, 'alert' => $alert]);

    }
    public function update(Request $request): RedirectResponse
    {

        Comments::where('ID', $request->ID)
            ->update(
                [

                    'comment' => $request->comment,

                    'Status' => $request->Status,
                    'updated_at' => Carbon::now()
                ]

            );

        return redirect('admin/comment/find/' . $request->ID . '/alert');

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