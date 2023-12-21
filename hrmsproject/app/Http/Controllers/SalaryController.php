<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;

class SalaryController extends Controller
{

public function index(){

                    //get the current user role
                    $currentUserRole = auth()->user()->role->role;
            
                    //check if the current user role is admin, if not, return restricted page.
                    if($currentUserRole == 'admin'){
                    $salaries = Salary::paginate(10);
            
                    return view('salaries.index',compact('salaries'));
                    }
                    else{
                    return 'Restricted page';
        }
}
}
