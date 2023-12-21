<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Department, EmployeeDepartment;

class DepartmentController extends Controller
{

public function index(){
    //get the current user role
    $currentUserRole = auth()->user()->role->role;

    //check if the current user role is admin, if not, return restricted page.
    if($currentUserRole == 'admin'){
    $departments = Department::paginate(10);

    return view('departments.index',compact('departments'));
    }
    else{
    return 'Restricted page';
    }
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










