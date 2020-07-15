<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\AttachFile;
use App\Models\DocumentCategory;
use App\Models\DocumentStep;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $document = Document::all();
        $data['document'] = $document;
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $filename = $request->file->getClientOriginalName();

        $document = new Document();
        $document->owner_id = $request['owner_id'];
        $document->club_id = $request['club_id'];
        $document->document_category_id = $request['document_category_id'];
        $document->advisor_id = $request['advisor_id'];
        $document->name = $request['name'];
        $document->name_en = $request['name_en'];
        $document->start_at = $request['start_at'];
        $document->end_at = $request['end_at'];
        $document->purpose_budget = $request['purpose_budget'];
        $document->real_budget = $request['real_budget'];
        $document->file_name = $filename;
        $document->save();

        $file = $request->file('file');
        Storage::disk('minio')->put("test/".$document->id.".".explode(".", $filename)[1], file_get_contents($file));


        return $document->id;
    }

    public function uploadFile(Request $request)
    {
        $filename = $request->file('file')->getClientOriginalName();
        $newfilename = Carbon::now().$filename;
        $file = $request->file('file');
        // dd($file);
        Storage::disk('minio')->put("test/".$newfilename , file_get_contents($file));
        $temp = Storage::disk('minio')->url("test/".$newfilename);

        return $temp;
    }

    public function show($id)
    {
        $document = Document::find($id);
        return $document;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $document = Document::find($id);
        $document->owner_id = $request['owner_id'];
        $document->club_id = $request['club_id'];
        $document->document_category_id = $request['document_category_id'];
        $document->advisor_id = $request['advisor_id'];
        $document->name = $request['name'];
        $document->name_en = $request['name_en'];
        $document->start_at = $request['start_at'];
        $document->end_at = $request['end_at'];
        $document->purpose_budget = $request['purpose_budget'];
        $document->real_budget = $request['real_budget'];
        $document->file_name = $request['file_name'];
        $document->save();
        return $id;
    }

    public function destroy($id)
    {
        $document = Document::find($id);
        $document->delete();
        return $id;
    }

    public function getDocumentListsByOwnerId($owner_id) {
        $document = Document::where('owner_id', $owner_id)
        ->join('document_categories', 'document_category_id', '=', 'document_categories.id')
        ->select('documents.*', 'document_categories.name as document_category_name')
        ->get();
        
        foreach($document as $i){
            $document_step_latest = DocumentStep::where('document_id', $i->id)->latest()->first();
            $i->status = $document_step_latest->status;
        }

        return $document;
    }

    public function createDocument($owner_id) {
        $document = new Document();
        $document->owner_id = $request['owner_id'];
        $document->club_id = $request['club_id'];
        $document->document_category_id = $request['document_category_id'];
        $document->advisor_id = $request['advisor_id'];
        $document->name = $request['name'];
        $document->name_en = $request['name_en'];
        $document->start_at = $request['start_at'];
        $document->end_at = $request['end_at']; 
        $document->file_name = $request['file_name'];
        $document->purpose_budget = $request['purpose_budget']; //infer only
        $document->real_budget = $request['real_budget']; //offer only
        $document->save();

        $document_id = $document->id;
        $document_category_id = $document->document_category_id;
        $file_main = $request['file'];
        $file_name = $document->file_name;

        $files = $request['attach'];
        $photos = $request['photo'];

        $document_category = DocumentCategory::find($document_category_id);
        if($document_category->name == 'แบบเสนอโครงการ'){
            $path = $document_id."/".$file_name;
            Storage::disk('minio')->put('1/attach/file.jpg', $file_main);

            // $this->uploadFileAttach($document_id,$files);
        }elseif($document_category->name == 'แบบสรุปโครงการ'){
            $this->uploadPhotoAttach($document_id,$photos);
        }
        
        return $document->id;
    }

    public function uploadFileAttach($document_id,$files) {
        foreach ($files as $file){ 
            $attach_file = new AttachFile();
            $attach_file->document_id = $document_id;
            $attach_file->name = $file;
            $attach_file->save();
        return $attach_file->id;
        }


    }

    public function uploadPhotoAttach($document_id,$photos) {
        $photo = new Photo();


    }
}