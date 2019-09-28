<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permission = Permission::all();
        $data['permission'] = $permission;
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $permission = new Permission();
        $permission->name = $request['name'];
        $permission->display_name = $request['display_name'];
        $permission->description = $request['description'];
        $permission->save();
        return $permission;
    }

    public function show($id)
    {
        $permission = Permission::find($id);
        return $permission;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::find($id);
        $permission->name = $request['name'];
        $permission->display_name = $request['display_name'];
        $permission->description = $request['description'];
        $permission->save();
        return $permission;
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return $permission;
    }
}
