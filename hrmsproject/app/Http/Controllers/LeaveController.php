<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Leave, Employee;

class LeaveController extends Controller
{

public function index(){

    //get the current user role
    $currentUserRole = auth()->user()->role->role;

    //check if the current user role is admin, if not, return restricted page.
    if($currentUserRole == 'admin'){
    $leaves = Leave::paginate(10);

    return view('leaves.index',compact('leaves'));
    }
    else{
    return 'Restricted page';
    }
}
}