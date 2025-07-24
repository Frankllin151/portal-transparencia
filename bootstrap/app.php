<?php

use App\Http\Middleware\CustomAuthAndVerified;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
          $middleware->alias([
            'auth' => CustomAuthAndVerified::class,
            // Se você também quiser substituir 'verified', adicione:
            // 'verified' => CustomAuthAndVerified::class,
            // Ou crie um novo alias para usar seletivamente em suas rotas:
            // 'myauth' => CustomAuthAndVerified::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
