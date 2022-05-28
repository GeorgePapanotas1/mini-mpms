<?php

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

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::group([
    'middleware' => ['auth'],
    'prefix' => 'dashboard',
], function () {
    Route::get('/', [MainController::class, 'index'])->name('dashboard');

    Route::controller(PracticeController::class)->group(function () {
        Route::get('/practice/{practice}', 'show')->name('practice.show');
        Route::get('/practice/{practice}/edit', 'edit')->name('practice.edit');
        Route::post('/practice/{practice}/update', 'update')->name('practice.update');
        Route::get('/practice/{practice}/delete', 'destroy')->name('practice.delete');
        Route::get('/practice/{practice}/store', 'store')->name('practice.store');
    });
});

require __DIR__.'/auth.php';
