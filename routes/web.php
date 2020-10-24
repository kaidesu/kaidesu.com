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

Route::get('/', 'PostsController@index')->name('posts.index');
Route::get('/{year}/{month}/{slug}', 'PostsController@show')->name('posts.show');

Route::get('/projects', 'ProjectsController@index')->name('projects.index');
Route::get('/projects/{slug}', 'ProjectsController@show')->name('projects.show');

Route::get('/{slug}', 'PagesController@show')->name('pages.show');