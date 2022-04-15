<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;


Route::get('/', function () {
    return view('website.home');
});

Route::get('/join', function () {
    return view('auth.register');
});

Route::get('/tt', function () {
    return view('website.test.page2');
});



Route::get('contact', function () {
    return view('website.contact');
});

Route::get('404', function () {
    return view('website.error');
});

Route::get('donate', function () {
    return view('website.donate');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
        Route::post('/test', 'test')->name('test');


    });

Route::controller(\App\Http\Controllers\EventAttachmentController::class)
    ->prefix('/events_attachment')
    ->as('events_attachment.')
    ->group(function () {
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::get('/download/{id}', 'download')->name('download');
        Route::get('/show/{id}', 'show')->name('show');

    });



Route::group(['middleware' => ['auth']], function () {
//    Route::resource('roles', [\App\Http\Controllers\RoleController::class]);
//    Route::resource('users', \App\Http\Controllers\UserController::class);

});
