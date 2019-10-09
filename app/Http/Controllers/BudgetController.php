<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    
    public function index()
    {
        $budget = Budget::all();
        $data['budget'] = $budget;
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $budget = new Budget();
        $budget->club_id = $request['club_id'];
        $budget->edu_year = $request['edu_year'];
        $budget->budget = $request['budget'];
        $budget->save();
        return $budget->id;
    }

    public function show($id)
    {
        $budget = Budget::find($id);
        return $budget;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $budget = Budget::find($id);
        $budget->edu_year = $request['edu_year'];
        $budget->budget = $request['budget'];
        $budget->save();
        return $id;
    }

    public function destroy($id)
    {
        $budget = Budget::find($id);
        $budget->delete();
        return $id;
    }
}
