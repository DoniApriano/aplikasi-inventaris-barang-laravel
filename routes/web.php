<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\owner\OwnerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the 'web' middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('auth/login', [AuthController::class, 'index']);
Route::post('auth/login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => 'check-role:Admin', 'as' => 'Admin.'], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('index');
    Route::get('/admin/employee', [AdminController::class, 'employeePage'])->name('employeePage');
    Route::post('/admin/employee', [AdminController::class, 'employeeCreate'])->name('employeeCreate');

    Route::delete('/admin/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'check-role:Owner', 'as' => 'Owner.'], function () {
    Route::get('/owner/dashboard', [OwnerController::class, 'index'])->name('index');
    Route::delete('/owner/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'check-role:Employee', 'as' => 'Employee.'], function () {

});
