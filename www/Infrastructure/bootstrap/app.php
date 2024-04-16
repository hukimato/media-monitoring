<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__ . '/../../../'))
    ->withRouting(
        api: __DIR__.'/../routes/api.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();


$app->useBootstrapPath($app->basePath('Infrastructure/bootstrap'));
$app->useAppPath($app->basePath('Infrastructure/app'));
$app->useConfigPath($app->basePath('Infrastructure/config'));
$app->useDatabasePath($app->basePath('Infrastructure/database'));
$app->usePublicPath($app->basePath('public'));
$app->useStoragePath($app->basePath('Infrastructure/storage'));

return $app;
