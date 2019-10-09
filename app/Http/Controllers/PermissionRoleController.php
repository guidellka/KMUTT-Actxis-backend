<?php

namespace App\Http\Controllers;

use App\Models\PermissionRole;
use Illuminate\Http\Request;

class PermissionRoleController extends Controller
{
    public function index()
    {
        $permission_role = PermissionRole::all();
        $data['permission_role'] = $permission_role;
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $permission_role = new PermissionRole();
        $permission_role->permission_id = $request['permission_id'];
        $permission_role->role_id = $request['role_id'];
        $permission_role->save();
        return $permission_role->id;
    }

    public function show($id)
    {
        $permission_role = PermissionRole::find($id);
        return $permission_role;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $permission_role = PermissionRole::find($id);
        $permission_role->permission_id = $request['permission_id'];
        $permission_role->role_id = $request['role_id'];
        $permission_role->save();
        return $id;
    }

    public function destroy($id)
    {
        $permission_role = PermissionRole::find($id);
        $permission_role->delete();
        return $id;
    }
}
