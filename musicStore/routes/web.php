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
//Frontend site
Route::get('/','HomeController@index');





//Backend routes

Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');

Route::post('/admin_dashboard',[
    'as'=>'admin_dashboard',
    'uses'=>'AdminController@dashboard']);

Route::get('/logout','AdminController@logout');

//categorias relacionadas com as rotas
Route::get('/add_category','CategoryController@index');

Route::get('/all_category','CategoryController@all_category');

Route::post('/save_category',[
    'as'=>'save_category',
    'uses'=>'CategoryController@save_category']);

//Route::get('/save_category','CategoryController@save_category');