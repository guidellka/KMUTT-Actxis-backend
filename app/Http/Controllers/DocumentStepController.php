<?php

namespace App\Http\Controllers;

use App\Models\DocumentStep;
use Illuminate\Http\Request;

class DocumentStepController extends Controller
{
    public function index()
    {
        $document_step = DocumentStep::all();
        $data['document_step'] = $document_step;
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $document_step = new DocumentStep();
        $document_step->document_id = $request['document_id'];
        $document_step->category_step_id = $request['category_step_id'];
        $document_step->inspector_id = $request['inspector_id'];
        $document_step->status = $request['status'];
        $document_step->save();
        return $document_step->id;
    }

    public function show($id)
    {
        $document_step = DocumentStep::find($id);
        return $document_step;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $document_step = DocumentStep::find($id);
        $document_step->document_id = $request['document_id'];
        $document_step->category_step_id = $request['category_step_id'];
        $document_step->inspector_id = $request['inspector_id'];
        $document_step->status = $request['status'];
        $document_step->save();
        return $id;
    }

    public function destroy($id)
    {
        $document_step = DocumentStep::find($id);
        $document_step->delete();
        return $id;
    }
}