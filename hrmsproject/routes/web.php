<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeInfoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//routes for employeesInfo
Route::get('/employee', [EmployeeInfoController::class, 'index']);
Route::get('/employee/{id}', [EmployeeInfoController::class, 'show']);
Route::get('/employee/{id}/edit', [EmployeeInfoController::class, 'edit']);
Route::get('/employee', [EmployeeInfoController::class, 'create']);
Route::post('/employee', [EmployeeInfoController::class, 'store']);
Route::put('/employee/{id}/update', [EmployeeInfoController::class, 'update']);
Route::delete('/employee/{id}', [EmployeeInfoController::class, 'destroy']);



require __DIR__.'/auth.php';
