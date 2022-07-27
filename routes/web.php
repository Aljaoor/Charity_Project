<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Models\User;
use Illuminate\Notifications\Notification;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\acountStatus;

use App\Http\Controllers\RequestForHelpController;



Route::get('/', function () {
    return view('website.home');
});

Route::get('/join', function () {
    return view('auth.register');
});

Route::get('/tt', function () {
    return view('website.test.page2');
});

Route::get('/11', function () {
    return view('website.volunteer');
});

//Route::post('/test', [App\Http\Controllers\EventVolunteerController::class, 'test'])->name('test');

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


Route::get('/about', function () {
    return view('website.about');
})->name('about');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/store-project', [App\Http\Controllers\ProjectController::class, 'store']);
Route::get('/contact',[App\Http\Controllers\EventController::class, 'contact'])->name('contact');

Route::get('/open_nitification/{id}/{n_id}', [App\Http\Controllers\EventController::class, 'open_nitification'])->name('open_nitification');



Route::controller(EventController::class)
    ->prefix('/events')
    ->as('event.')
   ->middleware(['auth','acountStatus'])
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
   ->middleware(['auth','acountStatus'])
    ->group(function () {

        Route::get('/volunteering/{id}', 'volunteering')->name('volunteering');
        Route::get('/view', 'view')->name('view');

        Route::get('/acceptable', 'acceptable')->name('acceptable');
        Route::get('/rejected', 'rejected')->name('rejected');
        Route::get('/pending', 'pending')->name('pending');
        Route::get('/read_notification/{notification_id}', 'read_notification')->name('read_notification');



        Route::match(['post','get'],'/processing/{vid}/{eid}', 'processing')->name('processing-accept');
        Route::match(['get','post'],'/deny', 'deny')->name('deny');
        Route::match(['get','post'],'/searchEvent', 'searchEvent')->name('searchEvent');

        Route::match(['get','post'],'/acceptcheck', 'acceptcheck')->name('acceptcheck');
        Route::match(['get','post'],'/denycheck', 'denycheck')->name('denycheck');





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
    ->middleware(['auth','acountStatus'])
    ->group(function () {
        Route::post('/create', 'create')->name('create');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::get('/add', 'add')->name('add');
        Route::get('/show', 'show')->name('show');
        Route::post('/update', 'update')->name('update');
        Route::get('/edit/{id}', 'edit')->name('edit');
    });




Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles', \App\Http\Controllers\RoleController::class);

    Route::resource('users', \App\Http\Controllers\UserController::class);

});



Route::controller(RequestforhelpController::class)
    ->prefix('/request_for_help')
    ->as('request_for_help.')
    ->middleware(['auth','acountStatus'])
    ->group(function () {
        Route::get('/add', 'add')->name('add');
        Route::post('/create', 'create')->name('create');

        Route::get('/yourRequest', 'yourRequest')->name('yourRequest');
        Route::get('/all', 'all')->name('all');
        Route::get('/Waiting', 'Waiting')->name('Waiting');
        Route::get('/rejected', 'rejected')->name('rejected');
        Route::get('/Beneficiaries', 'Beneficiaries')->name('Beneficiaries');




        Route::get('/details/{request_id}', 'details')->name('details');

        Route::get('/delete_request/{request_id}', 'delete_request')->name('delete_request');

        Route::post('/deny', 'deny')->name('deny');

        Route::post('/accept', 'accept')->name('accept');


        Route::match(['post','get'],'/search_office', 'search_office')->name('search_office');





    });


Route::controller(\App\Http\Controllers\RequestProofController::class)
    ->prefix('/request_proof')
    ->as('request_proof.')
    ->group(function () {

        Route::get('/show/{file_name}/{request_id}', 'show')->name('show');
        Route::get('/download/{file_name}/{request_id}', 'download')->name('download');
        Route::get('/delete/{file_name}/{request_id}', 'delete')->name('delete');




    });

Route::controller(\App\Http\Controllers\BeneficiaryController::class)
    ->prefix('/Beneficiary')
    ->as('Beneficiary.')
    ->group(function () {

        Route::post('/accept', 'accept')->name('accept');





    });
