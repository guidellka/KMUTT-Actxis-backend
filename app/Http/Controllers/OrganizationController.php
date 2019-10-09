<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $organization = Organization::all();
        $data['organization'] = $organization;
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $organization = new Organization();
        $organization->name = $request['name'];
        $organization->save();
        return $organization->id;
    }

    public function show($id)
    {
        $organization = Organization::find($id);
        return $organization;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $organization = Organization::find($id);
        $organization->name = $request['name'];
        $organization->save();
        return $id;
    }

    public function destroy($id)
    {
        $organization = Organization::find($id);
        $organization->delete();
        return $id;
    }
}