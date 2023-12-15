<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(){
       $employees=Employee::all();

       return $employees;
    }

    // public function show($id){
    //     $employee=Employee::find($id);
        // $departments=$employee->employeeDepartments;
        // return $departments;

        // foreach($departments as $department){
        //     dd($department->department);

        // }
 
        // return $employee->employeeDepartments;
    //  }

    public function show($id){
        $employee = Employee::find($id);

        return $employee;
    }

     public function create(){
        //
    }

    public function store(Request $request){

        //validate the inputs
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'address' => 'required|string|min:5|max:255',
            'age' => 'required|integer|min:18|max:99',
            'birthday' => 'required|date',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|string|min:10|max:20',
            'date_hired' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'status' => 'required|string|min:2|max:20',
            
        ]);

        //insert new entry
        $employee = Employee::create($validated);

        return $employee;

    }

    public function edit($id){
        $employee = Employee::find($id);

        return $employee;
    }

    public function update(Request $request, $id){
        
        //validate the inputs
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'address' => 'required|string|min:5|max:255',
            'age' => 'required|integer|min:18|max:99',
            'birthday' => 'required|date',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|string|min:10|max:20',
            'date_hired' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'status' => 'required|string|min:2|max:20',
        ]);
        //update the entry
        $employee = Employee::where('id', $id)->update($validated);

        return $employee;
    }

    public function destroy($id){
        $employee = Employee::where('id', $id)->delete();

        return $employee;
    }

}
