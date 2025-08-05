<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

// Основные CRUD маршруты
Route::apiResource('users', UserController::class);
Route::apiResource('posts', PostController::class); 
Route::apiResource('comments', CommentController::class);

// Специальные маршруты из ТЗ
Route::get('users/{user}/posts', [UserController::class, 'userPosts']);
Route::get('users/{user}/comments', [UserController::class, 'userComments']);
Route::get('posts/{post}/comments', [PostController::class, 'postComments']);