<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table='employees';
    
    protected $fillable = [
        'name',
        'address',
        'age',
    ];

    public function employeeDepartments(){
       return $this->hasMany(EmployeeDepartment::class);
    }

    public function leaves(){
        return $this->hasMany(Leave::class);
    }

    public function salaries(){
        return $this->hasMany(Salary::class);
    }

    
}
