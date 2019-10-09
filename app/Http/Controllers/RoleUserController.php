<?php

namespace App\Http\Controllers;

use App\Models\RoleUser;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    public function index()
    {
        $role_user = RoleUser::all();
        $data['role_user'] = $role_user;
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $role_user = new RoleUser();
        $role_user->user_id = $request['user_id'];
        $role_user->role_id = $request['role_id'];
        $role_user->save();
        return $role_user->id;
    }

    public function show($id)
    {
        $role_user = RoleUser::find($id);
        return $role_user;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $role_user = RoleUser::find($id);
        $role_user->user_id = $request['user_id'];
        $role_user->role_id = $request['role_id'];
        $role_user->save();
        return $id;
    }

    public function destroy($id)
    {
        $role_user = RoleUser::find($id);
        $role_user->delete();
        return $id;
    }
}
