<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        $photo = Photo::all();
        $data['photo'] = $photo;
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $photo = new Photo();
        $photo->document_id = $request['document_id'];
        $photo->name = $request['name'];
        $photo->save();
        return $photo->id;
    }

    public function show($id)
    {
        $photo = Photo::find($id);
        return $photo;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $step = Photo::find($id);
        $photo->document_id = $request['document_id'];
        $photo->name = $request['name'];
        $photo->save();
        return $id;
    }

    public function destroy($id)
    {
        $step = Photo::find($id);
        $step->delete();
        return $id;
    }
}
