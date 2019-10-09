<?php

namespace App\Http\Controllers;

use App\Models\DocumentCategory;
use Illuminate\Http\Request;

class DocumentCategoryController extends Controller
{
    public function index()
    {
        $document_category = DocumentCategory::all();
        $data['document_category'] = $document_category;
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $document_category = new DocumentCategory();
        $document_category->name = $request['name'];
        $document_category->save();
        return $document_category->id;
    }

    public function show($id)
    {
        $document_category = DocumentCategory::find($id);
        return $document_category;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $document_category = DocumentCategory::find($id);
        $document_category->name = $request['name'];
        $document_category->save();
        return $id;
    }

    public function destroy($id)
    {
        $document_category = DocumentCategory::find($id);
        $document_category->delete();
        return $id;
    }
}