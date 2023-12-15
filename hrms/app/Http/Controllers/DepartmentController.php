<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index(){
        $departments = Department::all();

        return $departments;
    }

    public function show($id){
        $department = Department::find($id);

        return $department;
    }

    public function create(){
        //
    }

    public function store(Request $request){

        //validate the inputs
        $validated = $request->validate([
            'department' => 'required|string|min:2|max:25',
            'schedule' => 'required|string|min:5|max:10',
            'is_active_flag' => 'required|boolean'
        ]);

        //insert new entry
        $department = Department::create($validated);

        return $department;

    }

    public function edit($id){
        $department = Department::find($id);

        return $department;
    }

    public function update(Request $request, $id){
        
        //validate the inputs
        $validated = $request->validate([
            'department' => 'required|string|min:2|max:25',
            'schedule' => 'required|string|min:5|max:10',
            'is_active_flag' => 'required|boolean'
        ]);
        //update the entry
        $department = Department::where('id', $id)->update($validated);

        return $department;
    }

    public function destroy($id){
        $department = Department::where('id', $id)->delete();

        return $department;
    }
}
