<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

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
        $document = new Document();
        $document->owner_id = $request['owner_id'];
        $document->club_id = $request['club_id'];
        $document->document_category_id = $request['document_category_id'];
        $document->advisor_id = $request['advisor_id'];
        $document->name = $request['name'];
        $document->name_en = $request['name_en'];
        $document->purpose_budget = $request['purpose_budget'];
        $document->real_budget = $request['real_budget'];
        $document->save();
        return $document;
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
        $document->purpose_budget = $request['purpose_budget'];
        $document->real_budget = $request['real_budget'];
        $document->save();
        return $document;
    }

    public function destroy($id)
    {
        $document = Document::find($id);
        $document->delete();
        return $document;
    }
}