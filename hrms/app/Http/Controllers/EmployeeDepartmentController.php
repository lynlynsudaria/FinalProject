<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeDepartment;

class EmployeeDepartmentController extends Controller
{
    public function index(){
        $employeeDepartments = EmployeeDepartment::all();

        return $employeeDepartments;
    }

    public function show($id){
        $employeeDepartment=EmployeeDepartment::find($id);

        return $employeeDepartment->employee;
    }

    public function create(){
        //
    }

    public function store(Request $request){

        //validate the inputs
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'department_id' => 'required|exists:departments,id',
            'leave' => 'boolean',
            'salary' => 'numeric',
        ]);

        //insert new entry
        $employeeDepartment = EmployeeDepartment::create($validated);

        return $employeeDepartment;

    }

    public function edit($id){
        $employeeDepartment = EmployeeDepartment::find($id);

        return $employeeDepartment;
    }

    public function update(Request $request, $id){
        
        //validate the inputs
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'department_id' => 'required|exists:departments,id',
            'leave' => 'boolean',
            'salary' => 'numeric',
        ]);
        //update the entry
        $employeeDepartment = EmployeeDepartment::where('id', $id)->update($validated);

        return $employeeDepartment;
    }

    public function destroy($id){
        $employeeDepartment = EmployeeDepartment::where('id', $id)->delete();

        return $employeeDepartment;
    }
}
