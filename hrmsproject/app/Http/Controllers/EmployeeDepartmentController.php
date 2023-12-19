<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\EmployeeDepartment, Department;

class EmployeeDepartmentController extends Controller
{
//     public function index(){
//         $employeeDepartments = EmployeeDepartment::all();

//         // return $employeeDepartments;
//         return view('employeeDepartments.index', ['employeeDepartments' => $employeeDepartments]);
//     }

//     public function show($id){
//         $employeeDepartment=EmployeeDepartment::find($id);

//         return $employeeDepartment->employee;
//     }

//     public function create(){
//         //
//     }

//     public function store(Request $request){

//         //validate the inputs
//         $validated = $request->validate([
//             'employee_id' => 'required|exists:employees,id',
//             'department_id' => 'required|exists:departments,id',
//             // 'leave' => 'boolean',
//             // 'salary' => 'numeric',
//         ]);

//         //insert new entry
//         $employeeDepartment = EmployeeDepartment::create($validated);

//         return $employeeDepartment;

//     }

//     public function edit($id){
//         $employeeDepartment = EmployeeDepartment::find($id);

//         return $employeeDepartment;
//     }

//     public function update(Request $request, $id){
        
//         //validate the inputs
//         $validated = $request->validate([
//             'employee_id' => 'required|exists:employees,id',
//             'department_id' => 'required|exists:departments,id',
//             'leave' => 'boolean',
//             'salary' => 'numeric',
//         ]);
//         //update the entry
//         $employeeDepartment = EmployeeDepartment::where('id', $id)->update($validated);

//         return $employeeDepartment;
//     }

//     public function destroy($id){
//         $employeeDepartment = EmployeeDepartment::where('id', $id)->delete();

//         return $employeeDepartment;
//     }
// }
public function index(){
    //get the current user role
    $currentUserRole = auth()->user()->role->role;

    //check if the current user role is admin, if not, return restricted page.
    if($currentUserRole == 'admin'){
        $employeeDepartments=EmployeeDepartment::paginate(10);

        return view('employeeDepartments.index', compact('employeeDepartments'));
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
    $employeeDepartment = EmployeeDepartment::find($id);

    return view('employeeDepartments.show',compact('employeeDepartment'));
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
    $employeeDepartment = EmployeeDepartment::find($id);

    return view('employeeDepartments.edit',compact('employeeDepartment'));
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
        return view('employeeDepartments.create');
    }
    else{
        return 'Restricted page';
    }
}

public function store(Request $request){

    //validate the inputs
    $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'department_id' => 'required|exists:departments,id',
            'leave' => 'boolean',
            'salary' => 'numeric',
        
    ]);

    //insert new 
    $employeeDepartment = EmployeeDepartment::create($validatedData);

     //redirect to the new page
     return redirect('/employeeDepartment/'.$employeeDepartment->id)->with('success', 'Success!');

}


public function update(Request $request, $id){
    
    //validate the inputs
    $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'department_id' => 'required|exists:departments,id',
            'leave' => 'boolean',
            'salary' => 'numeric',
    ]);
    //insert new
    $employeeDepartment = EmployeeDepartment::where('id', $id)->update($validatedData);

    //redirect to the new page
    return redirect('/employeeDepartment/'.$id)->with('success', 'Success!');
}

public function destroy($id){
    try{
        //implementation of the atomic principle
        DB::beginTransaction();
        EmployeeDepartment::where('id', $id)->delete();
        Deparment::where('employeeDepartment_id', $id)->delete();
    DB::commit();

    return redirect('/employeeDepartments')->with('success', 'Success!');

}catch(\Exception $e){
    DB::rollBack();
}

}
}
