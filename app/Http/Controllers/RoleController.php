<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::all();
        $data['role'] = $role;
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $role = new Role();
        $role->name = $request['name'];
        $role->display_name = $request['display_name'];
        $role->description = $request['description'];
        $role->save();
        return $role;
    }

    public function show($id)
    {
        $role = Role::find($id);
        return $role;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request['name'];
        $role->display_name = $request['display_name'];
        $role->description = $request['description'];
        $role->save();
        return $role;
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return $role;
    }
}
