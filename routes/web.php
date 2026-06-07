<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AAEventController;
use App\Http\Controllers\AARegistrationController;
use App\Http\Controllers\AAUserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'throttle:60,1'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/calendar', [AAEventController::class, 'calendar'])->name('calendar');

    Route::resource('events', AAEventController::class)->only(['index', 'show']);

    Route::middleware(['isOrganizer'])->group(function () {
        Route::resource('events', AAEventController::class)->except(['index', 'show']);
        Route::get('/events/{event}/registrations', [AARegistrationController::class, 'index'])->name('registrations.index');
        Route::put('/events/{event}/registrations/{registration}/approve', [AARegistrationController::class, 'approve'])->name('registrations.approve');
        Route::put('/events/{event}/registrations/{registration}/decline', [AARegistrationController::class, 'decline'])->name('registrations.decline');
    });

    Route::post('/events/{event}/register', [AARegistrationController::class, 'store'])->name('registrations.store');

    Route::middleware(['isAdmin'])->group(function () {
        Route::resource('users', AAUserController::class)->only(['index', 'show']);
        Route::put('/users/{user}/role', [AAUserController::class, 'updateRole'])->name('users.updateRole');
    });

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    });

    Route::resource('tasks', TaskController::class);
});




