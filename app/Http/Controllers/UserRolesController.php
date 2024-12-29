<?php

namespace App\Http\Controllers;

use App\Models\user_Roles;
use App\Http\Requests\Storeuser_RolesRequest;
use App\Http\Requests\Updateuser_RolesRequest;

class UserRolesController extends Controller
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
    public function create()
    {
        //
    }
    public function MakeAdmin($id)
    {
        $role = user_Roles::where('user_id', $id)->first();
        if ($role->roles_id == 1) {
            error_log('BURAAAAAAAAAAA');
            user_Roles::where('user_id', $id)->update(['roles_id' => 2]);
        } else {
            user_Roles::where('user_id', $id)->update(['roles_id' => 1]);
        }

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeuser_RolesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(user_Roles $user_Roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user_Roles $user_Roles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateuser_RolesRequest $request, user_Roles $user_Roles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user_Roles $user_Roles)
    {
        //
    }
}
