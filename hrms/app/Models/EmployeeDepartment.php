<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDepartment extends Model
{
    use HasFactory;

    protected $table='employees_departments';

    protected $fillable = [
        'department',
        'schedule',
        'is_active_flag',
    ];

    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id')->withDefault();
    }

    // public function department(){
    //     return $this->belongsTo(Department::class, 'department_id')->withDefault();
    // }
}
