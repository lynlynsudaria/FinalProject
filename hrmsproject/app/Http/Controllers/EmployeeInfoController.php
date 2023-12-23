<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;


class EmployeeInfoController extends Controller
{
    public function index(){
        $employees = Employee::all();
        return view('employeeInfo.index', compact('employees'));
    }

}
