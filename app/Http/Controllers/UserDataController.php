<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    
    public function index()
    {
        $user_data = UserData::all();
        $data['user_data'] = $user_data;
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user_data = new UserData();
        $user_data->user_id = $request['user_id'];
        $user_data->first_name = $request['first_name'];
        $user_data->middle_name = $request['middle_name'];
        $user_data->last_name = $request['last_name'];
        $user_data->student_id = $request['student_id'];
        $user_data->department = $request['department'];
        $user_data->faculty = $request['faculty'];
        $user_data->branch = $request['branch'];
        $user_data->email = $request['email'];
        $user_data->tel_no = $request['tel_no'];
        $user_data->save();
        return $user_data;
    }

    public function show($id)
    {
        $user_data = UserData::find($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $user_data = UserData::find($id);
        $user_data->user_id = $request['user_id'];
        $user_data->first_name = $request['first_name'];
        $user_data->middle_name = $request['middle_name'];
        $user_data->last_name = $request['last_name'];
        $user_data->student_id = $request['student_id'];
        $user_data->department = $request['department'];
        $user_data->faculty = $request['faculty'];
        $user_data->branch = $request['branch'];
        $user_data->email = $request['email'];
        $user_data->tel_no = $request['tel_no'];
        $user_data->save();
        return $user_data;
    }

    public function destroy($id)
    {
        $user_data = UserData::find($id);
        $user_data->delete();
        return $user_data;
    }
}
