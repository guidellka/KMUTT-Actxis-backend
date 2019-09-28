<?php

namespace App\Http\Controllers;

use App\Models\OrganizationUser;
use Illuminate\Http\Request;

class OrganizationUserController extends Controller
{
    public function index()
    {
        $organization_user = OrganizationUser::all();
        $data['organization_user'] = $organization_user;
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $organization_user = new OrganizationUser();
        $organization_user->organization_id = $request['organization_id'];
        $organization_user->user_id = $request['user_id'];
        $organization_user->save();
        return $organization_user;
    }

    public function show($id)
    {
        $organization_user = OrganizationUser::find($id);
        return $organization_user;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $organization_user = OrganizationUser::find($id);
        $organization_user->organization_id = $request['organization_id'];
        $organization_user->user_id = $request['user_id'];
        $organization_user->save();
        return $organization_user;
    }

    public function destroy($id)
    {
        $organization_user = OrganizationUser::find($id);
        $organization_user->delete();
        return $organization_user;
    }
}
