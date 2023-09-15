<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/detail/{id}', [ArticleController::class, 'detail']);
Route::get('/articles/delete/{id}', [ArticleController::class, 'delete']);

Route::get('/articles/edit/{id}', [ArticleController::class, 'edit']);
Route::post('/articles/edit{id}',[ArticleController::class, 'update']);

Route::get('/articles/add', [ArticleController::class, 'add']);
Route::post('/articles/add',[ArticleController::class, 'create']);

Route::post('/comments/add',[CommentController::class, 'create']);
Route::get('/comments/delete/{id}',[CommentController::class,'delete']);
//Route::post('/articles/update', [ArticleController::class, 'update']);



Route::get('/', [ArticleController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');