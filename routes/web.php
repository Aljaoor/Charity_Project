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
Route::get('/test-web', function () {
    return view('website.test.page1');
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [App\Http\Controllers\UserController::class, 'getUsers']);

Route::get('/store-project', [App\Http\Controllers\ProjectController::class, 'store']);

Route::group(['middleware' => ['auth']], function () {
//    Route::resource('roles', [\App\Http\Controllers\RoleController::class]);
//    Route::resource('users', \App\Http\Controllers\UserController::class);

});
