<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeInfo extends Model
{
    use HasFactory;

    protected $table='employees';
    
    protected $fillable = [
        'name',
        'address',
        'age',
        'birthday',
        'email',
        'contact_number',
        'date_hired',
        'gender',
        'is_active_flag',
    ];
    
}
