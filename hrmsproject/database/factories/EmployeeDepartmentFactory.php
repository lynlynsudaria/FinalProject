<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeDepartment>
 */
class EmployeeDepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employee_id' =>Employee::all()->random()->id,
            'department_id' =>Department::all()->random()->id,
            'administrator_id' =>Administrator::all()->random()->id,
        ];
    }
}
