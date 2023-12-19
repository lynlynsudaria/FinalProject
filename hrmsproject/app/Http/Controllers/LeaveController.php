<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Leave, Employee;

class LeaveController extends Controller
{
//     public function index(){
//         $leaves = Leave::all();

//         // return $leaves;
//         return view('leaves.index', ['leaves' => $leaves]);
//     }

//     public function show($id){
//         $leave = Leave::find($id);

//         return $leave;
//     }

//     public function create(){
//         //
//     }

//     public function store(Request $request){

//         //validate the inputs
//         $validated = $request->validate([
//             'leave_type' => 'required|string|min:2|max:25',
//             'start_date' => 'required|date',
//             'end_date' => 'required|date|after_or_equal:start_date',
//             'is_active_flag' => 'required|boolean',
//         ]);

//         //insert new entry
//         $leave = Leave::create($validated);

//         return $leave;

//     }

//     public function edit($id){
//         $leave = Leaves::find($id);

//         return $leave;
//     }

//     public function update(Request $request, $id){
        
//         //validate the inputs
//         $validated = $request->validate([
//             'leave_type' => 'required|string|min:2|max:25',
//             'start_date' => 'required|date',
//             'end_date' => 'required|date|after_or_equal:start_date',
//             'is_active' => 'required|boolean',
//         ]);
//         //update the entry
//         $leave = Leave::where('id', $id)->update($validated);

//         return $leave;
//     }

//     public function destroy($id){
//         $leave = Leave::where('id', $id)->delete();

//         return $leave;
//     }
// }
public function index(){
    //get the current user role
    $currentUserRole = auth()->user()->role->role;

    //check if the current user role is admin, if not, return restricted page.
    if($currentUserRole == 'admin'){
        $leaves=Leave::paginate(10);

        return view('leaves.index', compact('leaves'));
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
    $leave = Leave::find($id);

    return view('leaves.show',compact('leave'));
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
    $leave  = Leave::find($id);

    return view('leaves.edit',compact('leave '));
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
        return view('leaves.create');
    }
    else{
        return 'Restricted page';
    }
}

public function store(Request $request){

    //validate the inputs
    $validatedData = $request->validate([
            'leave_type' => 'required|string|min:2|max:25',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'is_active' => 'required|boolean',
        
    ]);

    //insert new leave 
    $leave  = Leave::create($validatedData);

     //redirect to the new page
     return redirect('/leave /'.$leave ->id)->with('success', 'Success!');

}


public function update(Request $request, $id){
    
    //validate the inputs
    $validatedData = $request->validate([
           'leave_type' => 'required|string|min:2|max:25',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'is_active' => 'required|boolean',
    ]);
    //insert the  new leave 
    $leave  = Leave::where('id', $id)->update($validatedData);

    //redirect to the new page
    return redirect('/leave /'.$id)->with('success', 'Success!');
}

public function destroy($id){
    try{
        //implementation of the atomic principle
        DB::beginTransaction();
        Leave::where('id', $id)->delete();
        Employee::where('leave _id', $id)->delete();
    DB::commit();

    return redirect('/leaves')->with('success', 'Success!');

}catch(\Exception $e){
    DB::rollBack();
}

}
}