<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test', function(Request $request) {
    return $request->getUri();
});

Route::get('/posts', [\Infrastructure\Http\Controllers\ListAllPostsController::class, 'index']);
Route::get('/posts/add', [\Infrastructure\Http\Controllers\AddNewPostController::class, 'index']);
Route::get('/posts/report', [\Infrastructure\Http\Controllers\CreatePostReportByIdsController::class, 'index']);




