<?php

namespace App\Http\Controllers;

use App\Models\Step;
use Illuminate\Http\Request;

class StepController extends Controller
{
    public function index()
    {
        $step = Step::all();
        $data['step'] = $step;
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $step = new Step();
        $step->name = $request['name'];
        $step->save();
        return $step->id;
    }

    public function show($id)
    {
        $step = Step::find($id);
        return $step;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $step = Step::find($id);
        $step->name = $request['name'];
        $step->save();
        return $id;
    }

    public function destroy($id)
    {
        $step = Step::find($id);
        $step->delete();
        return $id;
    }
}
