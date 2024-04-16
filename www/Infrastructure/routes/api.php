<?php

declare(strict_types=1);

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test', function(Request $request) {
    return $request->getUri();
});

Route::get('/posts', [PostController::class, 'list']);
Route::get('/posts/add', [PostController::class, 'create']);
Route::get('/posts/report', [PostController::class, 'report']);




