<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table='departments';

    protected $fillable = [
        'department',
        'schedule',
        'is_active_flag',
    ];

    
    public function employees(){
        return  $this->hasMany(Employee::class);
    }
}
