<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index()
    {
        $club = Club::all();
        $data['club'] = $club;
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $club = new Club();
        $club->name = $request['name'];
        $club->save();
        return $club->id;
    }

    public function show($id)
    {
        $club = Club::find($id);
        return $club;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $club = Club::find($id);
        $club->name = $request['name'];
        $club->save();
        return $id;
    }

    public function destroy($id)
    {
        $club = Club::find($id);
        $club->delete();
        return $id;
    }
}
