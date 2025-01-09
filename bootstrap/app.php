<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        $exceptions->render(function (Throwable $e) {
            if ($e instanceof NotFoundHttpException && $e->getPrevious() instanceof ModelNotFoundException) {
                return response()->json([
                    'message' => __('messages.business_rules.generic.not_found_explicit'),
                ], Response::HTTP_NOT_FOUND);
            }

            if ($e instanceof ModelNotFoundException) {
                return response()->json([
                    'message' => __('messages.business_rules.generic.not_found_explicit'),
                ], Response::HTTP_NOT_FOUND);
            }

            return null;
        });
    })->create();
