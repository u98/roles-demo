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

Route::get('/', function () {
   return view('welcome');
})->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
Route::auth();
Route::resource('users', 'UserController');

Route::get('/getCurrentUser', function() {
   return Auth::user()->load('roles');
});

Route::match(['get', 'post'], '/logout', 'Auth\LoginController@logout')->name('logout');