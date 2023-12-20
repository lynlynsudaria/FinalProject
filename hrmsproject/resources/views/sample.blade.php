<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Department, EmployeeDepartment;

class DepartmentController extends Controller
{
//     public function index(){
//         $departments = Department::all();

//         // return $departments;
//         return view('departments.index', ['departments' => $departments]);
//     }

//     public function show($id){
//         $department = Department::find($id);

//         return $department;
//     }

//     public function create(){
//         //
//     }

//     public function store(Request $request){

//         //validate the inputs
//         $validated = $request->validate([
//             'department' => 'required|string|min:2|max:25',
//             'schedule' => 'required|string|min:5|max:10',
//             'is_active_flag' => 'required|boolean'
//         ]);

//         //insert new entry
//         $department = Department::create($validated);

//         return $department;

//     }

//     public function edit($id){
//         $department = Department::find($id);

//         return $department;
//     }

//     public function update(Request $request, $id){
        
//         //validate the inputs
//         $validated = $request->validate([
//             'department' => 'required|string|min:2|max:25',
//             'schedule' => 'required|string|min:5|max:10',
//             'is_active_flag' => 'required|boolean'
//         ]);
//         //update the entry
//         $department = Department::where('id', $id)->update($validated);

//         return $department;
//     }

//     public function destroy($id){
//         $department = Department::where('id', $id)->delete();

//         return $department;
//     }
// }
public function index(){
    //get the current user role
    $currentUserRole = auth()->user()->role->role;

    //check if the current user role is admin, if not, return restricted page.
    if($currentUserRole == 'admin'){
        $departments=Department::paginate(10);

        return view('departments.index', compact('departments'));
    }
    else{
        return 'Restricted page';
    }

}


public function show($id){
     //get the current user role
     $currentUserRole = auth()->user()->role->role;

     //check if the current user role is admin, if not, return restricted page.
     if($currentUserRole == 'admin'){
    $department = Department::find($id);

    return view('departments.show',compact('department'));
    }
    else{
        return 'Restricted page';
    }

}
public function edit($id){
    //get the current user role
    $currentUserRole = auth()->user()->role->role;

    //check if the current user role is admin, if not, return restricted page.
    if($currentUserRole == 'admin'){
    $department = Department::find($id);

    return view('departments.edit',compact('department'));
    }
    else{
        return 'Restricted page';
    }
}

 public function create(){
    //get the current user role
    $currentUserRole = auth()->user()->role->role;

    //check if the current user role is admin, if not, return restricted page.
    if($currentUserRole == 'admin'){
        return view('departments.create');
    }
    else{
        return 'Restricted page';
    }
}

public function store(Request $request){

    //validate the inputs
    $validatedData = $request->validate([
        'department' => 'required|string|min:2|max:25',
        'is_active_flag' => 'required|boolean',
        
    ]);

    //insert new department
    $department = Department::create($validatedData);

     //redirect to the new page
     return redirect('/department/'.$department->id)->with('success', 'Success!');

}


public function update(Request $request, $id){
    try{
        //validate the inputs
    $validatedData = $request->validate([
        'department' => 'required|string|min:2|max:25',
        'is_active_flag' => 'required|boolean'
    ]);
    //iupdate the  new sdepartment
    $department = Department::where('id', $id)->update($validatedData);

    //redirect to the new page
    return redirect('/department/'.$id)->with('success', 'Success!');
}


}catch(\Exception $e){
   return $e;
}
   

public function destroy($id){
    try{
        //implementation of the atomic principle
        DB::beginTransaction();
        EmployeeDepartment::where('department_id', $id)->delete();
        Department::where('id', $id)->delete();
    DB::commit();

    return redirect('/departments')->with('success', 'Success!');

}catch(\Exception $e){
    DB::rollBack();
}

}












