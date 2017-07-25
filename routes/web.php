<?php

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

/*
 *
 * Static Pages
 *
 * */
Route::get('/', 'pagesController@getIndex');

Route::get('contact', 'PagesController@getContact');
Route::get('about', 'PagesController@getAbout');


Auth::routes();

/*
 *
 * Posts
 *
 * */
Route::get('home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController');

Route::get('blog/{slug}', ['uses' => 'BlogController@getSingle', 'as' => 'blog.single'])->where('slug', '[\w\d\-\_]+');