<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\maincategory;
use App\Models\Product;
use App\Models\Settings;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProductRequest;
use illuminate\Http\RedirectResponse;
use Carbon\Carbon;
use Str;

class UserController extends Controller
{

    public function myaccount()
    {
        $setting = Settings::first();
        $maincategories = maincategory::all();
        $product = Product::all();
        $myaccount = User::where('id', '=', Auth::user()->id)->first()->toArray();
        return view(
            'home.userProfile',
            [
                'setting' => $setting,
                'maincategory' => $maincategories,
                'products' => $product,
                'myaccount' => $myaccount
            ]
        );

    }
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

            $categorylist = User::where('Title', 'LIKE', '%' . $search . '%')
                ->paginate($page, ['*'], 1);
        } else {

            $categorylist = User::with('roles')->paginate($page, ['*'], 1);

        }


        return view('admin.user._tableUsers', ['data' => $categorylist]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = User::all()->firstOrFail()->toArray();

        return view('admin.user._usersFormAdd', ['data' => $data]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $creted = User::create(
            [

                'id',
                'name' => $request->name,
                'email' => $request->email,
                'email_verified_at' => $request->email_verified_at,
                'password' => $request->password,
                'two_factor_secret' => $request->two_factor_secret,
                'two_factor_recovery_codes' => $request->two_factor_recovery_codes,
                'two_factor_confirmed_at' => $request->two_factor_confirmed_at,
                'remember_token' => $request->remember_token,
                'User_Role' => $request->User_Role,
                'current_team_' => $request->current_team_,
                'profile_photo_path' => $request->profile_photo_path,
                'created_at' => $request->created_at,
                'updated_at' => $request->updated_at


            ]

        );


        return redirect('admin/user/find/' . $creted->id . '/alert');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function find($id, $alert = "")
    {
        $data = User::find($id)->toArray();

        return view('admin.user._usersFormUpdate', ['data' => $data, 'alert' => $alert]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        User::where('id', $request->ID)
            ->update(
                [

                    'name' => $request->name,
                    'email' => $request->email,
                    'email_verified_at' => $request->email_verified_at,
                    'password' => $request->password,
                    'two_factor_secret' => $request->two_factor_secret,
                    'two_factor_recovery_codes' => $request->two_factor_recovery_codes,
                    'two_factor_confirmed_at' => $request->two_factor_confirmed_at,
                    'remember_token' => $request->remember_token,
                    'User_Role' => $request->User_Role,
                    'current_team_' => $request->current_team_,
                    'profile_photo_path' => $request->profile_photo_path,
                    'updated_at' => Carbon::now()
                ]

            );

        return redirect('admin/user/find/' . $request->ID . '/alert');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $category, $id)
    {
        User::where('id', '=', $id)->delete();
        return redirect('admin/user/?alert=alertDel');
    }

}
