<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;

class LeaveController extends Controller
{
    public function index(){
        $leaves = Leave::all();

        return $leaves;
    }

    public function show($id){
        $leave = Leave::find($id);

        return $leave;
    }

    public function create(){
        //
    }

    public function store(Request $request){

        //validate the inputs
        $validated = $request->validate([
            'leave_type' => 'required|string|min:2|max:25',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'is_active_flag' => 'required|boolean',
        ]);

        //insert new entry
        $leave = Leave::create($validated);

        return $leave;

    }

    public function edit($id){
        $leave = Leaves::find($id);

        return $leave;
    }

    public function update(Request $request, $id){
        
        //validate the inputs
        $validated = $request->validate([
            'leave_type' => 'required|string|min:2|max:25',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'is_active' => 'required|boolean',
        ]);
        //update the entry
        $leave = Leave::where('id', $id)->update($validated);

        return $leave;
    }

    public function destroy($id){
        $leave = Leave::where('id', $id)->delete();

        return $leave;
    }
}
