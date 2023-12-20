<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
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
        try{
            //implementation of the atomic principle
            DB::beginTransaction();

             $validatedEmployeeData = $request->validate([
                'name'=> 'required|string|min:2|max:255',
                'address'=> 'required|string|min:5|max:255',
                'age'=>'required|integer|min:18|max:99',
                'birthday'=> 'required',
                'email'=> 'required|max:255',
                'contact_number'=> 'required|min:10|max:20',
                'date_hired'=> 'required',
                'gender'=> 'required|string',
            ]);
                
            DB::commit();
            
        //insert new employee
            $employee = Employee::create($validatedEmployeeData);
   
         //redirect to the new page
            return redirect('/employee/'.$employee->id)->with('success', 'Success!');

        }
        catch(\Exception $e){
            DB::rollBack();
    }
}

    // public function create()
    // {
    //     return view('employees.create'); // Create a blade file for your form
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string',
    //         'address' => 'required|string',
    //         'age' => 'required|integer',
    //         'birthday' => 'required|date',
    //         'email' => 'required|email|unique:employees,email',
    //         'contact_number' => 'required|string',
    //         'date_hired' => 'required|date',
    //         'gender' => 'required|string',
    //         // Add other validation rules for your fields
    //     ]);

    //     // Create a new employee
    //     $employee = Employee::create([
    //         'name' => $request->input('name'),
    //         'address' => $request->input('address'),
    //         'age' => $request->input('age'),
    //         'birthday' => $request->input('birthday'),
    //         'email' => $request->input('email'),
    //         'contact_number' => $request->input('contact_number'),
    //         'date_hired' => $request->input('date_hired'),
    //         'gender' => $request->input('gender'),
    //         // Add other fields as needed
    //     ]);
    //     return redirect()->route('employees.index')->with('success', 'Employee added successfully.');
    //     // return redirect('/employees')->with('success', 'Employee added successfully.');
    // }


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
                Employee::where('id', $id)->delete();
            DB::commit();
        
            return redirect('/employees')->with('success', 'Success!');
        
        }catch(\Exception $e){
            
            DB::rollBack();
        }
        
        }
    }
        

//     public function destroy($id)
//     {
//         // Find the employee by ID
//         $employee = Employee::find($id);

//         // Check if the employee exists
//         if ($employee) {
//             // Delete the employee
//             $employee->delete();

//             // Redirect back or to a specific route after deletion
//             return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
//         } else {
//             // Redirect back or to a specific route with an error message
//             return redirect()->route('employees.index')->with('error', 'Employee not found');
//         }
//     }
// }
// 