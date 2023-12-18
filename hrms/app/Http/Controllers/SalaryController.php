<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;

class SalaryController extends Controller
{
    public function index(){
        $salaries = Salary::all();

        return $salaries;
    }

    public function show($id){
        $salary = Salary::find($id);

        return $salary;
    }

    public function create(){
        //
    }

    public function store(Request $request){

        //validate the inputs
        $validated = $request->validate([
            'salary_amount' => 'required|numeric|min:0',
            'released_date' => 'required|date',
            'mode_of_payment' => 'required|string|min:2|max:50',
        ]);

        //insert new entry
        $salary = Salary::create($validated);

        return $salary;

    }

    public function edit($id){
        $salary = Salary::find($id);

        return $salary;
    }

    public function update(Request $request, $id){
        
        //validate the inputs
        $validated = $request->validate([
            'salary_amount' => 'required|numeric|min:0',
            'released_date' => 'required|date',
            'mode_of_payment' => 'required|string|min:2|max:50',
        ]);
        //update the entry
        $salary = Salary::where('id', $id)->update($validated);

        return $salary;
    }

    public function destroy($id){
        $salary = Salary::where('id', $id)->delete();

        return $salary;
    }
}
