<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeDepartment;

class EmployeeDepartmentController extends Controller
{

public function index(){

    //get the current user role
    $currentUserRole = auth()->user()->role->role;

    //check if the current user role is admin, if not, return restricted page.
    if($currentUserRole == 'admin'){
        $employeeDepartments = EmployeeDepartment::paginate(100);

        return view('employeeDepartments.index',compact('employeeDepartments'));
    }
    else{
        return 'Restricted page';
    }

}
}
