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

Route::get('deletecompanie/{id}',[App\Http\Controllers\CompaniesController::class, 'destroy'])->name('deletecompanie');
Route::get('singlecompanie/{id}',[App\Http\Controllers\CompaniesController::class, 'show'])->name('singlecompanie');


