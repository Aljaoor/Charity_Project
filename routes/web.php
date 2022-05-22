<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Models\User;
use Illuminate\Notifications\Notification;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequesttController;




Route::get('/', function () {
    return view('website.home');
});

Route::get('/join', function () {
    return view('auth.register');
});

Route::get('/tt', function () {
    return view('website.test.page2');
});

Route::get('/rr', function () {
    return view('website.test.page1');
});

Route::get('contact', function () {
    return view('website.contact');
});

Route::get('/markAsRead', function(){

    auth()->user()->unreadNotifications->markAsRead();

    return redirect()->back();

    })->name('mark');


Route::get('404', function () {
    return view('website.error');
});

Route::get('donate', function () {
    return view('website.donate');
});
Route::get('/403', function () {
    return view('website.error_403');
})->name('403');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/store-project', [App\Http\Controllers\ProjectController::class, 'store']);
Route::get('/contact',[App\Http\Controllers\EventController::class, 'contact'])->name('contact');

Route::get('/open_nitification/{id}/{n_id}', [App\Http\Controllers\EventController::class, 'open_nitification'])->name('open_nitification');



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
        Route::get('/volunteering/{id}', 'volunteering')->name('volunteering');


    });
Route::controller(\App\Http\Controllers\EventVolunteerController::class)
    ->prefix('/eventsvolunteer')
    ->as('eventsvolunteer.')
   ->middleware(['auth'])
    ->group(function () {

        Route::get('/volunteering/{id}', 'volunteering')->name('volunteering');
        Route::get('/view', 'view')->name('view');

        Route::get('/acceptable', 'acceptable')->name('acceptable');
        Route::get('/rejected', 'rejected')->name('rejected');
        Route::get('/pending', 'pending')->name('pending');



        Route::get('/processing/{vid}/{eid}', 'processing')->name('processing-accept');
        Route::post('/deny', 'deny')->name('deny');
        Route::post('/searchEvent', 'searchEvent')->name('searchEvent');



    });

Route::controller(\App\Http\Controllers\EventAttachmentController::class)
    ->prefix('/events_attachment')
    ->as('events_attachment.')
    ->group(function () {
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::get('/download/{id}', 'download')->name('download');
        Route::get('/show/{id}', 'show')->name('show');

    });

Route::controller(\App\Http\Controllers\OfficeController::class)
    ->prefix('/offices')
    ->as('office.')
    ->group(function () {
        Route::post('/create', 'create')->name('create');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::get('/add', 'add')->name('add');
        Route::get('/show', 'show')->name('show');
        Route::post('/update', 'update')->name('update');
        Route::get('/edit/{id}', 'edit')->name('edit');
    });




Route::group(['middleware' => ['auth']], function () {
//    Route::resource('roles', [\App\Http\Controllers\RoleController::class]);
//    Route::resource('users', \App\Http\Controllers\UserController::class);

});
Route::controller(RequesttController::class)
    ->prefix('/request')
    ->as('request.')
   ->middleware(['auth'])
    ->group(function () {
        Route::get('/add', 'add')->name('add');
        Route::post('/create', 'create')->name('create');

        Route::get('/yourRequest/{id}', 'yourRequest')->name('yourRequest');

//        Route::post('/update', 'update')->name('update');
//        Route::get('/delete/{id}', 'delete')->name('delete');
//        Route::post('/test', 'test')->name('test');


    });

