<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');


Route::get('employee', [\App\Http\Controllers\Admin\EmployeeController::class, 'index'])->name('employee');
Route::get('employee/list', [\App\Http\Controllers\Admin\EmployeeController::class, 'getEmployeeList'])->name('employee.list');

Route::get('vcompany', [\App\Http\Controllers\Admin\VCompanyController::class, 'index'])->name('vcompany');
Route::get('vcompany/list', [\App\Http\Controllers\Admin\VCompanyController::class, 'getVcompanyList'])->name('vcompany.list');
Route::get('vcompany/create',[\App\Http\Controllers\Admin\VCompanyController::class, 'create'])->name('vcompany.create');
Route::post('vcompany/store', [\App\Http\Controllers\Admin\VCompanyController::class, 'store'])->name('vcompany.store');
Route::get('vcompany/edit/{id}', [\App\Http\Controllers\Admin\VCompanyController::class, 'edit'])->name('vcompany.edit');
Route::post('vcompany/update/{id}', [\App\Http\Controllers\Admin\VCompanyController::class, 'update'])->name('vcompany.update');
Route::get('vcompany/delete/{id}', [\App\Http\Controllers\Admin\VCompanyController::class, 'delete'])->name('vcompany.delete');

Route::get('vdose', [\App\Http\Controllers\Admin\VDoseController::class, 'index'])->name('vdose');
Route::get('vdose/list', [\App\Http\Controllers\Admin\VDoseController::class, 'getVcompanyList'])->name('vdose.list');
Route::get('vdose/create',[\App\Http\Controllers\Admin\VDoseController::class, 'create'])->name('vdose.create');
Route::post('vdose/store', [\App\Http\Controllers\Admin\VDoseController::class, 'store'])->name('vdose.store');
Route::get('vdose/edit/{id}', [\App\Http\Controllers\Admin\VDoseController::class, 'edit'])->name('vdose.edit');
Route::post('vdose/update/{id}', [\App\Http\Controllers\Admin\VDoseController::class, 'update'])->name('vdose.update');
Route::get('vdose/delete/{id}', [\App\Http\Controllers\Admin\VDoseController::class, 'delete'])->name('vdose.delete');


Route::get('employeedashboard', [\App\Http\Controllers\Employees\DashboardController::class, 'index'])->name('employeedashboard');
Route::get('vaccine', [\App\Http\Controllers\Employees\VacaineController::class, 'index'])->name('vaccine');
Route::get('vaccine/list', [\App\Http\Controllers\Employees\VacaineController::class, 'getVaccinationList'])->name('vaccine.list');
Route::post('submitvaccine', [\App\Http\Controllers\Employees\VacaineController::class, 'submitvaccine'])->name('submitvaccine');



//Login & Register
Route::get('register', [\App\Http\Controllers\LoginController::class, 'register'])->name('register');
Route::get('login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('authenticate', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('authenticate');
Route::post('register', [\App\Http\Controllers\LoginController::class, 'postRegister'])->name('postRegister');
Route::get('logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
