<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

Route::get('/',[PublicController::class , 'homepage'])->name('homepage');

// article controller
Route::get('index/article',[ArticleController::class , 'index'])->name('article.index');
Route::get('create/article',[ArticleController::class , 'create'])->name('create.article')->middleware('auth');
Route::get('show/article/{article}',[ArticleController::class , 'show'])->name('article.show');
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');
// ricerca articoli
Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('article.search');



// revisor controller
Route::get('revisor/index' , [RevisorController::class , 'index'])->name('revisor.index')->middleware('isRevisor');
Route::patch('accept/{article}' , [RevisorController::class , 'accept'])->name('accept');
Route::patch('reject/{article}' , [RevisorController::class , 'reject'])->name('reject');
Route::get('revisor/request' , [RevisorController::class , 'becomeRevisor'])->name('become.revisor')->middleware('auth');
Route::get('make/revisor/{user}' , [RevisorController::class , 'makeRevisor'])->name('make.revisor');


// cambio lingua
Route::post('/lingua/{lang}',[PublicController::class , 'setLanguage'])->name('setLocale');