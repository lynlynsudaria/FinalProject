<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Salary, Employee;

class SalaryController extends Controller
{
//     public function index(){
//         $salaries = Salary::all();

//         // return $salaries;
//         return view('salaries.index', ['salaries' => $salaries]);
//     }

//     public function show($id){
//         $salary = Salary::find($id);

//         return $salary;
//     }

//     public function create(){
//         //
//     }

//     public function store(Request $request){

//         //validate the inputs
//         $validated = $request->validate([
//             'salary_amount' => 'required|numeric|min:0',
//             'released_date' => 'required|date',
//             'mode_of_payment' => 'required|string|min:2|max:50',
//         ]);

//         //insert new entry
//         $salary = Salary::create($validated);

//         return $salary;

//     }

//     public function edit($id){
//         $salary = Salary::find($id);

//         return $salary;
//     }

//     public function update(Request $request, $id){
        
//         //validate the inputs
//         $validated = $request->validate([
//             'salary_amount' => 'required|numeric|min:0',
//             'released_date' => 'required|date',
//             'mode_of_payment' => 'required|string|min:2|max:50',
//         ]);
//         //update the entry
//         $salary = Salary::where('id', $id)->update($validated);

//         return $salary;
//     }

//     public function destroy($id){
//         $salary = Salary::where('id', $id)->delete();

//         return $salary;
//     }
// }
public function index(){
    //get the current user role
    $currentUserRole = auth()->user()->role->role;

    //check if the current user role is admin, if not, return restricted page.
    if($currentUserRole == 'admin'){
        $salaries=Salary::paginate(10);

        return view('salaries.index', compact('salaries'));
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
    $salary = Salary::find($id);

    return view('salaries.show',compact('salary'));
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
    $salary = Salary::find($id);

    return view('salaries.edit',compact('salary'));
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
        return view('salaries.create');
    }
    else{
        return 'Restricted page';
    }
}

public function store(Request $request){

    //validate the inputs
    $validatedData = $request->validate([
            'salary_amount' => 'required|numeric|min:0',
            'released_date' => 'required|date',
            'mode_of_payment' => 'required|string|min:2|max:50',
        
    ]);

    //insert new Salary
    $salary = Salary::create($validatedData);

     //redirect to the new page
     return redirect('/salary/'.$salary->id)->with('success', 'Success!');

}


public function update(Request $request, $id){
    
    //validate the inputs
    $validatedData = $request->validate([
            'salary_amount' => 'required|numeric|min:0',
            'released_date' => 'required|date',
            'mode_of_payment' => 'required|string|min:2|max:50',
    ]);
    //insert the  new semployee
    $salary = Salary::where('id', $id)->update($validatedData);

    //redirect to the new page
    return redirect('/salary/'.$id)->with('success', 'Success!');
}

public function destroy($id){
    try{
        //implementation of the atomic principle
        DB::beginTransaction();
        Salary::where('id',$id )->delete();
        Employee::where('salary_id', $id)->delete();
    DB::commit();

    return redirect('/salaries')->with('success', 'Success!');

}catch(\Exception $e){
    DB::rollBack();
}

}
}
