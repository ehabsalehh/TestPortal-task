<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
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

Auth::routes();
    //companies
Route::resource("/companies",CompanyController::class);
Route::get('/dataTable-Index-company',[CompanyController::class,'dataTableIndex'])->name('companies.dataTableIndex');
// employees
Route::resource("/employees",EmployeeController::class);
Route::get('/dataTable-Index-employee',[EmployeeController::class,'dataTableIndex'])->name('employees.dataTableIndex');
// home
Route::get('/list-companies',[HomeController::class,'listCompanies'])->name('companies.listCompanies');
Route::get('/list-employees',[HomeController::class,'listEmployees'])->name('employees.listEmployees');
Route::get('/getCustomFilterData',[HomeController::class,'getCustomFilterData'])->name('employees.getCustomFilterData');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
