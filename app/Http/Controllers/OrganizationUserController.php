<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
        return $organization_user->id;
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
        return $id;
    }

    public function destroy($id)
    {
        $organization_user = OrganizationUser::find($id);
        $organization_user->delete();
        return $id;
    }

    public function getByUserId($id) {
        $organization_user = OrganizationUser::where('user_id', $id)->firstOrFail();
        return $organization_user;
    }

    public function getWithName($id) {
        $organization_user =  DB::table('organization_user')->where('user_id', $id)
                                ->join('organizations', 'organization_user.organization_id', '=', 'organizations.id')
                                ->select('organization_user.*', 'organizations.name')
                                ->get();
        return $organization_user;
    }
}
