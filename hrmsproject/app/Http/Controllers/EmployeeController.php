<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\{Employee, Salary, Leave, EmployeeDepartment};

class EmployeeController extends Controller
{
    public function index(){
        //get the current user role
        $currentUserRole = auth()->user()->role->role;

        //check if the current user role is admin, if not, return restricted page.
        if($currentUserRole == 'admin'){
            $employees=Employee::paginate(10);

            return view('employees.index', compact('employees'));
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
        $employee = Employee::find($id);

        return view('employees.show',compact('employee'));
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
        $employee = Employee::find($id);

        return view('employees.edit',compact('employee'));
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
            return view('employees.create');
        }
        else{
            return 'Restricted page';
        }
    }

    public function store(Request $request){

        //validate the inputs
        $validatedData = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'address' => 'required|string|min:5|max:255',
            'age' => 'required|integer|min:18|max:99',
            'birthday' => 'required|date',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|string|min:10|max:20',
            'date_hired' => 'required|date',
            'gender' => 'required|in:Male,Female,male,female',
            // 'is_active_flag' =>'required|boolean',
            
        ]);

        //insert new employee
        $employee = Employee::create($validatedData);

         //redirect to the new page
         return redirect('/employee/'.$employee->id)->with('success', 'Success!');

    }


    public function update(Request $request, $id){
        try{
            //validate the inputs
        $validatedData = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'address' => 'required|string|min:5|max:255',
            'age' => 'required|integer|min:18|max:99',
            'birthday' => 'required|date',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|string|min:10|max:20',
            'date_hired' => 'required|date',
            'gender' => 'required|in:Male,Female,male,female',
            // 'status' => 'required|string|min:2|max:20',
        ]);
        //insert the  new employee
        $employee = Employee::where('id', $id)->update($validatedData);

        //redirect to the new page
        return redirect('/employee/'.$id)->with('success', 'Success!');

    }catch(\Exception $e){
       return $e;
    }

        
        
    }

    public function destroy($id){
        try{
            //implementation of the atomic principle
            DB::beginTransaction();
            EmployeeDepartment::where('employee_id', $id)->delete();
            Leave::where('employee_id', $id)->delete();
            Salary::where('employee_id',$id )->delete();
            Employee::where('id', $id)->delete();
        DB::commit();

        return redirect('/employees')->with('success', 'Success!');

    }catch(\Exception $e){
        DB::rollBack();
    }

}
}