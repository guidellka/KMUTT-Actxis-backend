<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        $data['user'] = $user;
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->username = $request['username'];
        $user->password = $request['password'];
        $user->save();
        return $user;
    }

    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->username = $request['username'];
        $user->password = $request['password'];
        $user->save();
        return $user;
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return $user;
    }
}
