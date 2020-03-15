<?php

namespace App\Http\Controllers;

use App\Models\CategoryStep;
use Illuminate\Http\Request;

class CategoryStepController extends Controller
{
    public function index()
    {
        $category_step = CategoryStep::all();
        $data['category_step'] = $category_step;
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $category_step = new CategoryStep();
        $category_step->category_id = $request['category_id'];
        $category_step->step_id = $request['step_id'];
        $category_step->order = $request['order'];
        $category_step->save();
        return $category_step->id;
    }

    public function show($id)
    {
        $category_step = CategoryStep::find($id);
        return $category_step;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $category_step = CategoryStep::find($id);
        $category_step->category_id = $request['category_id'];
        $category_step->step_id = $request['step_id'];
        $category_step->order = $request['order'];
        $category_step->save();
        return $id;
    }

    public function destroy($id)
    {
        $category_step = CategoryStep::find($id);
        $category_step->delete();
        return $id;
    }
}
