<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\ExpensesController;
use Illuminate\Support\Facades\App;

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

// Route::get('index_', function () {
//     return view('index_');
// });

Route::get('/',[TenantController::class, 'index'])->name('index');
Route::get('/expenses',[ExpensesController::class, 'index'])->name('expenses');
Route::put('/expenses',[ExpensesController::class, 'update_expenses'])->name('update_expenses');
Route::get('/expenses/{total}/{id}',[ExpensesController::class, 'get_total'])->name('get_total');
// Route::get('/expenses', function () { return view('expenses'); })->name('expenses');
Route::post('/',[TenantController::class, 'add_tenant'])->name('add_tenant');
Route::get('/edit/{id}',[TenantController::class, 'edit_tenant'])->name('edit_tenant');
Route::put('/edit/{id}',[TenantController::class, 'update_tenant'])->name('update_tenant');
Route::get('/delete/{id}',[TenantController::class, 'destroy_tenant'])->name('destroy_tenant');



Route::get('/total',[ExpensesController::class, 'update_expenses_total'])->name('total');

//change language

Route::get('/{lang}',[TenantController::class, 'index_'])->name('index_');

