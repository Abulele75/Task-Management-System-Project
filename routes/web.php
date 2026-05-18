<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'throttle:60,1'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/calendar', [EventController::class, 'calendar'])
         ->name('calendar');

    
    Route::resource('events', EventController::class)
         ->middleware('isOrganizer')
         ->except(['index', 'show']);

    Route::resource('events', EventController::class)
         ->only(['index', 'show']);

    
    Route::prefix('events/{event}')->group(function () {
        Route::post('/register', [RegistrationController::class, 'store'])
             ->name('registrations.store');

        Route::middleware(['isOrganizer'])->group(function () {
            Route::get('/registrations', [RegistrationController::class, 'index'])
                 ->name('registrations.index');
            Route::put('/registrations/{registration}/approve', [RegistrationController::class, 'approve'])
                 ->name('registrations.approve');
            Route::put('/registrations/{registration}/decline', [RegistrationController::class, 'decline'])
                 ->name('registrations.decline');
        });
    });

    
    Route::middleware(['isAdmin'])->group(function () {
        Route::resource('users', UserController::class)
             ->only(['index', 'show']);
        Route::put('/users/{user}/role', [UserController::class, 'updateRole'])
             ->name('users.updateRole');
    });
});