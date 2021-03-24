<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::get('/{year}/{month}/{slug}', 'ArticlesController@show')->name('articles.show');

Route::get('/whois', function() {
    return redirect('/experience');
});

Route::get('/wiki', 'WikiController@index')->name('wiki.index');
Route::get('/wiki/{url?}.source', 'WikiController@source')->name('wiki.source');
Route::get('/wiki/{url?}', 'WikiController@show')->name('wiki.show');
Route::get('/{slug}', 'PagesController@show')->name('pages.show');