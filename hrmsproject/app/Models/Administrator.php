<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    use HasFactory;
    protected $table='administrators';

    protected $fillable = [
        'name',
        'address',
        'email',
        'birthday',
        'contact_number',
        
    ];

    public function employeeDepartment(){
      return $this->hasMany(EmployeeDepartment::class);
    }
}
