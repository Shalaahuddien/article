<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(ArticlesController::class)->group(function () {
    Route::get('/', 'index')->name('homepage');
    Route::get('/articles/{slug}', 'show')->name('article.show');
    Route::get('/tags/', 'listTags')->name('tag.list');
    Route::get('/tags/{tag}', 'detailTag')->name('tag.detail');
    Route::get('/test', 'testRelation')->name('test.tag');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::post('/dashboard', 'create_article')->name('create.article');
    Route::get('/login', 'login_form')->name('login.form');
    Route::post('/login', 'login')->name('login.action');
    Route::get('/register', 'register')->name('register.form');
    Route::post('/register', 'create')->name('register.action');
    Route::post('/logout', 'logout')->name('logout');
    Route::delete('/dashboard/{id}', 'delete_article')
        ->name('delete.article')
        ->where(['id' => '[0-9]+']);
    Route::get('/dashboard/{id}', function ($id) {
        return view('Error.error', [
            'data'  => $id
        ]);
    });
    Route::get('/article/{slug}', 'edit_article')->name('edit.article');
    Route::put('/article/{id}','update_article')->name('update.article');
});
