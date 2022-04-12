<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use  App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('website.home');
});
Route::get('/log', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [App\Http\Controllers\UserController::class, 'getUsers']);

Route::get('/store-project', [App\Http\Controllers\ProjectController::class, 'store']);
Route::get('/contact',[App\Http\Controllers\EventController::class, 'contact'])->name('contact');

Route::controller(EventController::class)
    ->prefix('/events')
    ->as('event.')
//   ->middleware(['auth'])
    ->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/single/{id}', 'single')->name('single');
        Route::get('/add', 'add')->name('add');
        Route::post('/create', 'create')->name('create');
        Route::post('/update', 'update')->name('update');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::get('/delete/{id}', 'delete')->name('delete');
    });

Route::controller(\App\Http\Controllers\EventAttachmentController::class)
    ->prefix('/events_attachment')
    ->as('events_attachment.')
    ->group(function () {
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::get('/download/{id}', 'download')->name('download');
        Route::get('/show/{id}', 'show')->name('show');

    });

Route::controller(UserController::class)
    ->prefix('/user')
    ->as('user.')
//   ->middleware(['auth'])
    ->group(function () {
          Route::get('/create', 'create')->name('create');
          Route::post('/store', 'store')->name('store');
          Route::post('/log_in', 'log_in')->name('log_in');
//        Route::get('/single/{id}', 'single')->name('single');

//        Route::post('/update', 'update')->name('update');
//        Route::get('/edit/{id}', 'edit')->name('edit');
//        Route::get('/delete/{id}', 'delete')->name('delete');
    });


Route::group(['middleware' => ['auth']], function () {
//    Route::resource('roles', [\App\Http\Controllers\RoleController::class]);
//    Route::resource('users', \App\Http\Controllers\UserController::class);

});
