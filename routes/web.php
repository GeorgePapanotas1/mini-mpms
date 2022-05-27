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
], function () {
    Route::get('/dashboard', [MainController::class, 'index'])->name('dashboard');

    Route::controller(PracticeController::class)->group(function () {
        Route::get('/practice/{practice}/view', 'show'); // TODO Create the view for the single practice
        Route::get('/practice/{practice}/edit', 'edit'); // TODO Create the view for edit a single practice
        Route::get('/practice/{practice}/delete', 'delete'); // TODO Create the view for deleting a single practice
        Route::get('/practice/{practice}/store', 'store'); // TODO Create the view for storing the single practice
    });
});

require __DIR__.'/auth.php';
