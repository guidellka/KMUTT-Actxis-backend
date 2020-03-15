<?php

namespace App\Http\Controllers;

use App\Models\AttachFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachFileController extends Controller
{
    
    public function index()
    {
        $attach_file = AttachFile::all();
        // $url = Storage::disk('minio')->temporaryUrl(
        //     '1/attach/IMG_3416.JPG', now()->addMinutes(5)
        // );

        Storage::disk('minio')->put('1/attach/file.jpg', "asdads");
        $data['attach_file'] = $attach_file;
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $attach_file = new AttachFile();
        $attach_file->document_id = $request['document_id'];
        $attach_file->name = $request['file_name'];
        $attach_file->save();
        return $attach_file->id;
    }

    public function show($id)
    {
        $attach_file = AttachFile::find($id);
        return $attach_file;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $attach_file = AttachFile::find($id);
        $attach_file->document_id = $request['document_id'];
        $attach_file->name = $request['file_name'];
        $attach_file->save();
        return $id;
    }

    public function destroy($id)
    {
        $attach_file = AttachFile::find($id);
        $attach_file->delete();
        return $id;
    }
}
