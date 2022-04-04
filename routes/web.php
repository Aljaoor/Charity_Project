<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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
Route::get('/test_web', function () {
    return view('website.test.page2');
});
Route::get('/', function () {
    return view('website.home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [App\Http\Controllers\UserController::class, 'getUsers']);

Route::get('/store-project', [App\Http\Controllers\ProjectController::class, 'store']);

Route::controller(EventController::class)
    ->prefix('/events')
    ->as('event.')
//   ->middleware(['auth'])
    ->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/single', 'single')->name('single');
        Route::get('/add', 'add')->name('add');
        Route::post('/create', 'create')->name('create');
//        Route::post('/store', 'store')->name('store');
//        Route::post('/update', 'update')->name('update');
//        Route::get('/edit/{id}', 'edit')->name('edit');
//        Route::get('/delete/{id}', 'delete')->name('delete');
//        Route::get('/attachment/{id}', 'attachment')->name('attachment');
//        Route::get('open/{id}/{file_name}', 'open')->name('open');
    });

Route::group(['middleware' => ['auth']], function () {
//    Route::resource('roles', [\App\Http\Controllers\RoleController::class]);
//    Route::resource('users', \App\Http\Controllers\UserController::class);

});
