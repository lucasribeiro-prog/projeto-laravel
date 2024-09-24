<?php

use App\Http\Middleware\AutenticacaoMiddleware;
use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(LogAcessoMiddleware::class);

    })->withMiddleware(function(Middleware $middleware) {
        $middleware->alias([
            'autenticacao' => AutenticacaoMiddleware::class,
            'log' => LogAcessoMiddleware::class,
        ]);

    })->withMiddleware(function(Middleware $middleware) {
        $middleware->web(append: [
            LogAcessoMiddleware::class,
        ]);
    })
    ->create();
    
