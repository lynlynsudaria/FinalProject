<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeDepartmentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\AdministratorController;

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
Route::get('/employeesInfo', [EmployeeInfoController::class, 'index']);
Route::get('/employeeInfo/{id}', [EmployeeInfoController::class, 'show']);
Route::get('/employeeInfo/{id}/edit', [EmployeeInfoController::class, 'edit']);
Route::get('/employeeInfo', [EmployeeInfoController::class, 'create']);
Route::post('/employeeInfo', [EmployeeInfoController::class, 'store']);
Route::put('/employeeInfo/{id}/update', [EmployeeInfoController::class, 'update']);
Route::delete('/employeeInfo/{id}', [EmployeeInfoController::class, 'destroy']);
//route for employee
Route::get('/employees', [EmployeeController::class, 'index']);
Route::get('/employee/{id}', [EmployeeController::class, 'show']);
Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit']);
Route::get('/employee/', [EmployeeController::class, 'create']);
Route::post('/employee', [EmployeeController::class, 'store']);
Route::put('/employee/{id}', [EmployeeController::class, 'update']);
Route::delete('/employee/{id}', [EmployeeController::class, 'destroy']);

//route for the employeedepartment
Route::get('/employeeDepartments', [EmployeeDepartmentController::class, 'index']);
Route::get('/employeeDepartment/{id}', [EmployeeDepartmentController::class, 'show']);
Route::get('/employeeDepartment/{id}/edit', [EmployeeDepartmentController::class, 'edit']);
Route::get('/employeeDepartment/', [EmployeeDepartmentController::class, 'create']);
Route::post('/employeeDepartment/', [EmployeeDepartmentController::class, 'store']);
Route::put('/employeeDepartment/{id}/update', [EmployeeDepartmentController::class, 'update']);
Route::delete('/employeeDepartment/{id}', [EmployeeDepartmentController::class, 'destroy']);

//route for department
Route::get('/departments', [DepartmentController::class, 'index']);
Route::get('/department/{id}', [DepartmentController::class, 'show']);
Route::get('/department/{id}/edit', [DepartmentController::class, 'edit']);
Route::get('/department/', [DepartmentController::class, 'create']);
Route::post('/department/', [DepartmentController::class, 'store']);
Route::put('/department/{id}/', [DepartmentController::class, 'update']);
Route::delete('/department/{id}', [DepartmentController::class, 'destroy']);

//routes for leave
Route::get('/leaves', [LeaveController::class, 'index']);
Route::get('/leave/{id}', [LeaveController::class, 'show']);
Route::get('/leave/{id}/edit', [LeaveController::class, 'edit']);
Route::get('/leave/', [LeaveController::class, 'create']);
Route::post('/leave/', [LeaveController::class, 'store']);
Route::put('/leave/{id}/update', [LeaveController::class, 'update']);
Route::delete('/leave/{id}', [LeaveController::class, 'destroy']);

//routes for salary
Route::get('/salaries', [SalaryController::class, 'index']);
Route::get('/salary/{id}', [SalaryController::class, 'show']);
Route::get('/salary/{id}/edit', [SalaryController::class, 'edit']);
Route::get('/salary/', [SalaryController::class, 'create']);
Route::post('/salary/', [SalaryController::class, 'store']);
Route::put('/salary/{id}/update', [SalaryController::class, 'update']);
Route::delete('/salary/{id}', [SalaryController::class, 'destroy']);

//routes for administrator
Route::get('/administrators', [AdministratorController::class, 'index']);
Route::get('/administrator/{id}', [AdministratorController::class, 'show']);
Route::get('/administrator/{id}/edit', [AdministratorController::class, 'edit']);
Route::get('/administrator/', [AdministratorController::class, 'create']);
Route::post('/administrator/', [AdministratorController::class, 'store']);
Route::put('/administrator/{id}/update', [AdministratorController::class, 'update']);
Route::delete('/administrator/{id}', [AdministratorController::class, 'destroy']);

// routes for about us
Route::get('/aboutus', function () {
    return view('aboutus');
});
// })->middleware(['auth', 'verified'])->name('dashboard');

// routes for user
Route::get('/user', function(){
    $user = App\Models\User::find(auth()->user()->id);

   return $user->role->role;


});
// Route::middleware('auth')->group(function () {
//     Route::get('/user', function () {
//         // Check if the user is authenticated
//         if (auth()->check()) {
//             // Access the 'id' property of the authenticated user
//             $userId = auth()->user()->id;
//             $userName = auth()->user()->name;
//             $userRoleId = auth()->user()->role_id; // Assuming the role ID is stored in the 'role_id' column

//             // Use $userId as needed
//             return response()->json([
//                 'user_id' => $userId,
//                 'user_name' => $userName,
//                 'user_role_id' => $userRoleId,
//                 'user_role' => auth()->user()->role,
//                 // Add more fields as needed
//             ]);
//         } else {
//             // Handle the case where the user is not authenticated
//             // Redirect to login, show an error, or perform other actions
//         }
//     });
// });



require __DIR__.'/auth.php';
