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
        $document_step->step_id = $request['step_id'];
        $document_step->organize_user_id = $request['organize_user_id'];
        $document_step->advisor_id = $request['advisor_id'];
        $document_step->is_pass = $request['is_pass'];
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
        $document_step->step_id = $request['step_id'];
        $document_step->organize_user_id = $request['organize_user_id'];
        $document_step->advisor_id = $request['advisor_id'];
        $document_step->is_pass = $request['is_pass'];
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