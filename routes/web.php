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
})->name("home")->middleware('am');



Route::match(['get','post'],'/contact', ['uses'=>'AdminController@contact', 'as'=>'contact']);
//Route::get('/admin/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name("logout");
Auth::routes();

Route::group(['prefix'=>'admin','middleware' => ['auth']], function () {
    Route::get('/admin', "AdminController@index")->name("admin");
    Route::get('/all', "AdminController@all")->name("all");
    Route::match(['get','post'], '/add',  "AdminController@add")->name("add");
});
//Route::get('/home', 'HomeController@index')->name('home');
