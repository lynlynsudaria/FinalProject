<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Department, EmployeeDepartment;

class DepartmentController extends Controller
{
    
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
    ]);
    //iupdate the  new department
    $department = Department::where('id', $id)->update($validatedData);

    //redirect to the new page
    return redirect('/department/'.$id)->with('success', 'Success!');

}catch(\Exception $e){
   return $e;
}
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

}
departmentcontroller
// public function index(){
//     //get the current user role
//     $currentUserRole = auth()->user()->role->role;

//     //check if the current user role is admin, if not, return restricted page.
//     if($currentUserRole == 'admin'){
//         $departments=Department::paginate(10);

//         return view('departments.index', compact('departments'));
//     }
//     else{
//         return 'Restricted page';
//     }

// }


// public function show($id){
//      //get the current user role
//      $currentUserRole = auth()->user()->role->role;

//      //check if the current user role is admin, if not, return restricted page.
//      if($currentUserRole == 'admin'){
//     $department = Department::find($id);

//     return view('departments.show',compact('department'));
//     }
//     else{
//         return 'Restricted page';
//     }

// }
// public function edit($id){
//     //get the current user role
//     $currentUserRole = auth()->user()->role->role;

//     //check if the current user role is admin, if not, return restricted page.
//     if($currentUserRole == 'admin'){
//     $department = Department::find($id);

//     return view('departments.edit',compact('department'));
//     }
//     else{
//         return 'Restricted page';
//     }
// }

//  public function create(){
//     //get the current user role
//     $currentUserRole = auth()->user()->role->role;

//     //check if the current user role is admin, if not, return restricted page.
//     if($currentUserRole == 'admin'){
//         return view('departments.create');
//     }
//     else{
//         return 'Restricted page';
//     }
// }

// public function store(Request $request){

//     //validate the inputs
//     try{
//         //implementation of the atomic principle
//         DB::beginTransaction();
//     $validatedDepartmentData = $request->validate([
//         'department' => 'required|string|min:2|max:25',
        
//     ]);
//     DB::commit();

//     //insert new department
//     $department = Department::create($validatedDepartmentData);

//      //redirect to the new page
//      return redirect('/department/'.$department->id)->with('success', 'Success!');

// }catch(\Exception $e){
//     DB::rollBack();
// }
// }

// public function update(Request $request, $id){
//     try{
//         //validate the inputs
//     $validatedData = $request->validate([
//         'department' => 'required|string|min:2|max:25',
//     ]);
//     //update the  new department
//     $department = Department::where('id', $id)->update($validatedData);

//     //redirect to the new page
//     return redirect('/department/'.$id)->with('success', 'Success!');

// }catch(\Exception $e){
//    return $e;
// }
// } 

// public function destroy($id){
//     try{
//         //implementation of the atomic principle
//         DB::beginTransaction();
//         EmployeeDepartment::where('department_id', $id)->delete();
//         Department::where('id', $id)->delete();
//     DB::commit();

//     return redirect('/departments')->with('success', 'Success!');

// }catch(\Exception $e){
//     DB::rollBack();
// }

// }

// }
employeedepartmentcontroller
//     public function index(){
//        //get the current user role
//        $currentUserRole = auth()->user()->role->role;

//        //check if the current user role is admin, if not, return restricted page.
//        if($currentUserRole == 'admin'){
//            $employeeDepartments = EmployeeDepartment::paginate(100);

//            return view('employeeDepartments.index',compact('employeeDepartments'));
//        }
//        else{
//            return 'Restricted page';
//        }

//    }


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
leavecontroller
public function index(){
    //     //get the current user role
    //     $currentUserRole = auth()->user()->role->role;
    
    //     //check if the current user role is admin, if not, return restricted page.
    //     if($currentUserRole == 'admin'){
    //         $leaves=Leave::paginate(10);
    
    //         return view('leaves.index', compact('leaves'));
    //     }
    //     else{
    //         return 'Restricted page';
    //     }
    
    // }
    
    
    // public function show($id){
    //      //get the current user role
    //      $currentUserRole = auth()->user()->role->role;
    
    //      //check if the current user role is admin, if not, return restricted page.
    //      if($currentUserRole == 'admin'){
    //     $leave = Leave::find($id);
    
    //     return view('leaves.show',compact('leave'));
    //     }
    //     else{
    //         return 'Restricted page';
    //     }
    
    // }
    // public function edit($id){
    //     //get the current user role
    //     $currentUserRole = auth()->user()->role->role;
    
    //     //check if the current user role is admin, if not, return restricted page.
    //     if($currentUserRole == 'admin'){
    //     $leave  = Leave::find($id);
    
    //     return view('leaves.edit',compact('leave '));
    //     }
    //     else{
    //         return 'Restricted page';
    //     }
    // }
    
    //  public function create(){
    //     //get the current user role
    //     $currentUserRole = auth()->user()->role->role;
    
    //     //check if the current user role is admin, if not, return restricted page.
    //     if($currentUserRole == 'admin'){
    //         return view('leaves.create');
    //     }
    //     else{
    //         return 'Restricted page';
    //     }
    // }
    
    // public function store(Request $request){
    
    //     //validate the inputs
    //     $validatedData = $request->validate([
    //             'leave_type' => 'required|string|min:2|max:25',
    //             'start_date' => 'required|date',
    //             'end_date' => 'required|date|after_or_equal:start_date',
    //             'is_active' => 'required|boolean',
            
    //     ]);
    
    //     //insert new leave 
    //     $leave  = Leave::create($validatedData);
    
    //      //redirect to the new page
    //      return redirect('/leave /'.$leave ->id)->with('success', 'Success!');
    
    // }
    
    
    // public function update(Request $request, $id){
        
    //     //validate the inputs
    //     $validatedData = $request->validate([
    //            'leave_type' => 'required|string|min:2|max:25',
    //             'start_date' => 'required|date',
    //             'end_date' => 'required|date|after_or_equal:start_date',
    //             'is_active' => 'required|boolean',
    //     ]);
    //     //insert the  new leave 
    //     $leave  = Leave::where('id', $id)->update($validatedData);
    
    //     //redirect to the new page
    //     return redirect('/leave /'.$id)->with('success', 'Success!');
    // }
    
    // public function destroy($id){
    //     try{
    //         //implementation of the atomic principle
    //         DB::beginTransaction();
    //         Leave::where('id', $id)->delete();
    //         Employee::where('leave _id', $id)->delete();
    //     DB::commit();
    
    //     return redirect('/leaves')->with('success', 'Success!');
    
    // }catch(\Exception $e){
    //     DB::rollBack();
    // }
    
    // }
    // }
    salarycontroller









