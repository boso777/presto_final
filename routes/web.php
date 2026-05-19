<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;


Route::get('/',[PublicController::class , 'homepage'])->name('homepage');
Route::get('index/article',[PublicController::class , 'index'])->name('article.index');

// article controller
Route::get('create/article',[ArticleController::class , 'create'])->name('create.article')->middleware('auth');
Route::get('show/article/{article}',[ArticleController::class , 'show'])->name('article.show');
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');