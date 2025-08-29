<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', PanelController::class)->name('panel');
Route::resource('users', UserController::class);
Route::get('/create_user_role/{id}',[UserController::class,'createUserRoles'])->name('create.user.roles');
Route::post('/store_user_role/{id}',[UserController::class,'storeUserRoles'])->name('store.user.roles');
Route::resource('categories', CategoryController::class);
Route::resource('articles', ArticleController::class);
Route::resource('roles', RoleController::class);
Route::post('/ckeditor_image',[ArticleController::class,'ckeditorImage'])->name('ckeditor.upload');
Route::get('users_comments',[CommentController::class,'comments'])->name('users.comments');
Route::get('accept_comment/{comment}',[CommentController::class,'acceptComments'])->name('accept.comment');
Route::get('reject_comment/{comment}',[CommentController::class,'rejectComments'])->name('reject.comment');
Route::fallback(static function () {
    return view('admin.errors.404');
});
