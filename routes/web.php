<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

// Rotte Pubbliche
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('article.search');
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');

// Rotte Articoli
Route::prefix('articles')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/create', [ArticleController::class, 'create'])->name('article.create')->middleware('auth');
    Route::get('/show/{article}', [ArticleController::class, 'show'])->name('article.show');
    Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
});

// Rotte Revisore
Route::prefix('revisor')->group(function () {
    Route::get('/dashboard', [RevisorController::class, 'index'])->name('revisor.index')->middleware('isRevisor');
    Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('revisor.accept')->middleware('isRevisor');
    Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('revisor.reject')->middleware('isRevisor');
    Route::get('/request', [RevisorController::class, 'becomeRevisor'])->name('revisor.become')->middleware('auth');
    Route::get('/make/{user}', [RevisorController::class, 'makeRevisor'])->name('revisor.make');
});
