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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/companie', [App\Http\Controllers\CompaniesController::class, 'index'])->name('companie');
Route::get('/companie', [App\Http\Controllers\CompaniesController::class, 'create']);
Route::post('/addCompanie', [App\Http\Controllers\CompaniesController::class, 'store'])->name('addCompanie');
Route::post('/editCompanie/{id}', [App\Http\Controllers\CompaniesController::class, 'update'])->name('editCompanie');

Route::get('deletecompanie/{id}',[App\Http\Controllers\CompaniesController::class, 'destroy'])->name('deletecompanie');
Route::get('singlecompanie/{id}',[App\Http\Controllers\CompaniesController::class, 'show'])->name('singlecompanie');


Route::get('/emplyees', [App\Http\Controllers\EmployeesController::class, 'index'])->name('employees');
// Route::get('/emplyees', [App\Http\Controllers\EmployeesController::class, 'create']);

Route::post('/addEmployee', [App\Http\Controllers\EmployeesController::class, 'store'])->name('addEmployee');
Route::get('deleteemployee/{id}',[App\Http\Controllers\EmployeesController::class, 'destroy'])->name('deleteemployee');
Route::get('singleEmployee/{id}',[App\Http\Controllers\EmployeesController::class, 'show'])->name('singleEmployee');
Route::post('/editEmployee/{id}', [App\Http\Controllers\EmployeesController::class, 'update'])->name('editEmployee');
