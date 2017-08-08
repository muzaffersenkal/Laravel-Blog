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

Route::get('/', 'PageController@getIndex');
Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])
->where('slug','[\w\d\-\_]+');
Route::get('blog',['uses'=>'BlogController@getIndex','as'=>'blog.index']);
Route::get('contact', function () {
    return view('pages.contact');
});


    Route::get('about', function () {
        return view('pages.about    ');
    });

   Route::resource('posts','PostController');
   Route::resource('categories','CategoryController',['except'=>'create']);
   Route::resource('tags','TagController',['except'=> ['create']]);
//auth

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
