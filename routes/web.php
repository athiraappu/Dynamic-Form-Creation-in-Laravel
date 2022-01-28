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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');
Route::get('dynamicpage','HomeController@dynamicpage')->name('dynamicpage')->middleware('is_admin');

Route::get("addmore","HomeController@addMore");
Route::post("addmore","HomeController@addMorePost")->name('addmorePost');

Route::post("updatePost","HomeController@updatePost")->name('updatePost');



Route::get('/form/edit/{id}', 'HomeController@edit')->name('form.edit');
Route::post('/form/update/{id}', 'HomeController@update')->name('form.update');
Route::get('/form/delete/{id}', 'HomeController@delete')->name('form.delete');
Route::get('/form/show/{id}', 'HomeController@showForm')->name('form.show');

Route::get('/form/{id}/show', 'HomeController@show')->name('form.show');
