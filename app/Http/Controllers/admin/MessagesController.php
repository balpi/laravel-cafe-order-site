<?php

namespace App\Http\Controllers\admin;


use App\Models\Messages;
use App\Http\Requests\StoreMessagesRequest;
use App\Http\Requests\UpdateMessagesRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use illuminate\Http\RedirectResponse;
use Carbon\Carbon;
use Str;

class MessagesController extends Controller
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

            $categorylist = DB::table('messages')
                ->where('Title', 'LIKE', '%' . $search . '%')
                ->paginate($page, ['*'], 1);
        } else {
            $categorylist = DB::table('messages')
                ->paginate($page, ['*'], 1);
        }



        return view('admin.messages._tableMessages', ['data' => $categorylist]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        try {
            $data = Messages::all()->firstOrFail()->toArray();
        } catch (\Throwable $th) {
            $data = ['Name', 'Error'];
        }

        return view('admin.messages._messageFormAdd', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $creted = Messages::create(
            [

                'ID',
                'Name' => $request->Name,
                'Email' => $request->Email,
                'Phone' => $request->Phone,
                'Subject' => $request->Subject,
                'Message' => $request->Message,
                'Status' => $request->Status,
                'IP' => $request->IP,

                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]

        );


        return redirect('admin/messages/find/' . $creted->id . '/alert');

    }

    /**
     * Display the specified resource.
     */
    public function show(Messages $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Messages $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function find($id, $alert = "")
    {

        $data = Messages::find($id)->toArray();


        return view('admin.messages._messagesFormUpdate', ['data' => $data, 'alert' => $alert]);

    }
    public function update(Request $request): RedirectResponse
    {

        Messages::where('ID', $request->ID)
            ->update(
                [

                    'Name' => $request->Name,
                    'Email' => $request->Email,
                    'Phone' => $request->Phone,
                    'Subject' => $request->Subject,
                    'Message' => $request->Message,
                    'Status' => $request->Status,
                    'IP' => $request->IP,
                    'updated_at' => Carbon::now()
                ]

            );

        return redirect('admin/messages/find/' . $request->ID . '/alert');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(messages $category, $id)
    {
        Messages::where('ID', '=', $id)->delete();
        return redirect('admin/messages/?alert=alertDel');
    }
}