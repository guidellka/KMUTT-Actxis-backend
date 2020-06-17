<?php

namespace App\Http\Controllers;

use App\Models\DocumentFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentFileController extends Controller
{
    public function index()
    {
        $document_file = DocumentFile::all();
        // $url = Storage::disk('minio')->temporaryUrl(
        //     '1/attach/IMG_3416.JPG', now()->addMinutes(5)
        // );

        Storage::disk('minio')->put('1/attach/file.jpg', "asdads");
        $data['document_file'] = $document_file;
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $document_file = new DocumentFile();
        $document_file->document_id = $request['document_id'];
        $document_file->name = $request['name'];
        $document_file->save();
        return $document_file->id;
    }

    public function show($id)
    {
        $document_file = DocumentFile::find($id);
        return $document_file;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $document_file = DocumentFile::find($id);
        $document_file->document_id = $request['document_id'];
        $document_file->name = $request['name'];
        $document_file->save();
        return $id;
    }

    public function destroy($id)
    {
        $document_file = DocumentFile::find($id);
        $document_file->delete();
        return $id;
    }
}
