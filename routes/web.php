<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PracticeController;
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

Route::group([
    'middleware' => ['auth'],
    'prefix' => 'dashboard',
], function () {
    Route::get('/', [MainController::class, 'index'])->name('dashboard');

    Route::controller(PracticeController::class)->group(function () {
        Route::get('/practice/create', 'create')->name('practice.create');
        Route::get('/practice/{practice}', 'show')->name('practice.show');
        Route::get('/practice/{practice}/edit', 'edit')->name('practice.edit');
        Route::post('/practice/{practice}/update', 'update')->name('practice.update');
        Route::get('/practice/{practice}/delete', 'destroy')->name('practice.delete');
        Route::post('/practice/store', 'store')->name('practice.store');
    });

    Route::controller(FieldController::class)->group(function () {
        Route::get('/fields', 'index')->name('fields.index');
        Route::get('/fields/create', 'create')->name('fields.create');
        Route::post('/fields/store', 'store')->name('fields.store');
        Route::get('/fields/{field}/delete', 'destroy')->name('fields.destroy');
        Route::get('/fields/{field}/edit', 'edit')->name('fields.edit');
        Route::post('/fields/{field}/update', 'update')->name('fields.update');
    });

    Route::controller(EmployeeController::class)->group(function () {
        Route::get('/employee/create', 'create')->name('employees.create');
        Route::post('/employee/store', 'store')->name('employees.store');
        Route::get('/employee/{employee}/delete', 'destroy')->name('employees.destroy');
        Route::get('/employee/{employee}/edit', 'edit')->name('employees.edit');
        Route::post('/employee/{employee}/update', 'update')->name('employees.update');
    });

});

require __DIR__.'/auth.php';
