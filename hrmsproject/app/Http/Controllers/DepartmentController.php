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
        
//         return view('departments.index', compact('departments'));
//     }

//     public function show($id){
//         $department = Department::find($id);

//         return $department;
//     }

//     public function edit($id){
//         //get the current user role
//         $currentUserRole = auth()->user()->role->role;

//         //check if the current user role is admin, if not, return restricted page.
//         if($currentUserRole == 'admin'){
//         $department = Department::find($id);

//         return view('departments.edit',compact('department'));
//         }
//         else{
//             return 'Restricted page';
//         }
//     }

//      public function create(){
//         //get the current user role
//         $currentUserRole = auth()->user()->role->role;

//         //check if the current user role is admin, if not, return restricted page.
//         if($currentUserRole == 'admin'){
//             return view('departments.create');
//         }
//         else{
//             return 'Restricted page';
//         }
//     }

//     public function store(Request $request){
        
//         //validate the inputs
//         try{
//             //implementation of the atomic principle
//             DB::beginTransaction();
//         $validatedDepartmentData = $request->validate([
//             'department' => 'required|string|min:2|max:255',
              
//         ]);

//         //insert new department
//         $department = Department::create($validatedDepartmentData);

//         DB::commit();
//          //redirect to the new page
//          return redirect('/department/'.$department->id)->with('success', 'Success!');
//         }catch(\Exception $e){
//             DB::rollBack();
//     }
// }
//     public function update(Request $request, $id){
//         try{
//             //validate the inputs
//         $validatedData = $request->validate([
//             'department' => 'required|string|min:2|max:255',
        
//         ]);
//         //update the  new department
//         $department = Department::where('id', $id)->update($validatedData);

//         //redirect to the new page
//         return redirect('/department/'.$id)->with('success', 'Success!');
        
//     }catch(\Exception $e){
//        return $e;
//     }

        
        
//     }

//     public function destroy($id){
//             try{
//                 //implementation of the atomic principle
//                 DB::beginTransaction();
//                 EmployeeDepartment::where('department_id', $id)->delete();
//                 Employee::where('department_id', $id)->delete();
//                 Department::where('id', $id)->delete();
//             DB::commit();
        
//             return redirect('/departments')->with('success', 'Success!');
        
//         }catch(\Exception $e){
//             DB::rollBack();
//         }
        
//         }
//     }
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










