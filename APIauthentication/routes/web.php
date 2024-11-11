<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
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
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';
Route::controller(AdminController::class)->group(function() {
    Route::post('/createbook', 'createbook')->name('createbook');

    
});
Route::controller(BookController::class)->group(function () {
    Route::get('/getallbook', 'getallbooks')->name('getallbook');
});
Route::controller(CategoryController::class)->group(function () {
    Route::get('/getallcategory', 'getallcategory')->name('getallcategory');
});
