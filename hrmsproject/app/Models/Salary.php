<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $table='salaries';

    protected $fillable = [
        'salary_amount',
        'released_date',
        'mode_of_payment',
    ];

    public function employee(){
        return  $this->belongsTo(Employee::class, 'employee_id');
    }
}
