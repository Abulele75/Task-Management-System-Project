<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'isAdmin' => \App\Http\Middleware\IsAdmin::class,
            'isOrganizer' => \App\Http\Middleware\IsOrganizer::class,
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            'guest.role' => \App\Http\Middleware\GuestMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
    