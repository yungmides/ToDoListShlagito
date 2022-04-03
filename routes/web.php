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

Route::group(['prefix' => "/dashboard", 'middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('to_do_lists', \App\Http\Controllers\ToDoListController::class);
    Route::resource('to_do_lists.list_items', \App\Http\Controllers\ListItemController::class)->shallow();
});


require __DIR__.'/auth.php';
