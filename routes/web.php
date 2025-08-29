<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\EloquentController;
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/articles/{category:slug}', [ArticleController::class,'articles'])->name('front.articles');
Route::get('/article/{article}', [ArticleController::class,'article'])->name('front.article');
Route::get('/user/{user}/edit_article/{article:id}', [ArticleController::class,'editArticle'])->name('front.edit.article');
Route::post('submit_user_comment',[CommentController::class,'submitUserComment'])->name('submit.user.comment');
Route::fallback(static function () {
    return view('frontend.404');
});


Route::get('/eloquent', EloquentController::class)->name('eloquent');

