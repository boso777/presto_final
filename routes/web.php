<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;


Route::get('/',[PublicController::class , 'homepage'])->name('homepage');
Route::get('/article/create',[ArticleController::class , 'create'])->name('create.article')->middleware('auth');
