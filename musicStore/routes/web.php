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

//show categorias
Route::get('/produto_by_categoria/{cat_id}','HomeController@show_produto_by_categoria');

Route::get('/produto_by_marca/{m_id}','HomeController@show_produto_by_marca');

Route::get('/view_produto/{p_id}','HomeController@produto_detalhes_by_id');

Route::post('/add_to_carrinho','CarrinhoController@add_to_carrinho');






//Backend routes

Route::get('/admin','AdminController@index');

Route::get('/dashboard','SuperAdminController@index');

Route::post('/admin_dashboard',[
    'as'=>'admin_dashboard',
    'uses'=>'AdminController@dashboard']);

Route::get('/logout','SuperAdminController@logout');


//rotas relacionadas com as categorias
Route::get('/add_category','CategoryController@index');

Route::get('/all_category','CategoryController@all_category');

Route::post('/save_category',[
    'as'=>'save_category',
    'uses'=>'CategoryController@save_category']);

Route::get('/unactive_category/{cat_id}','CategoryController@unactive_category');

Route::get('/active_category/{cat_id}','CategoryController@active_category');

Route::get('/edit_cat/{cat_id}','CategoryController@edit_category');

Route::get('/update_cat/{cat_id}','CategoryController@update_category');

Route::get('/delete_cat/{cat_id}','CategoryController@delete_category');


//rotas relacionadas com as marcas
Route::get('/add_marca','MarcaController@index');

Route::post('/save_marca',[
    'as'=>'save_marca',
    'uses'=>'MarcaController@save_marca']);

Route::get('/all_marcas','MarcaController@all_marcas');

Route::get('/unactive_marca/{m_id}','MarcaController@unactive_marca');

Route::get('/active_marca/{m_id}','MarcaController@active_marca');

Route::get('/edit_marca/{m_id}','MarcaController@edit_marca');

Route::get('/update_marca/{m_id}','MarcaController@update_marca');

Route::get('/delete_marca/{m_id}','MarcaController@delete_marca');


//rotas relacionadas com os produtos
Route::get('/add_produto','ProdutoController@index');

Route::post('/save_produto',[
    'as'=>'save_produto',
    'uses'=>'ProdutoController@save_produto']);

Route::get('/all_produtos','ProdutoController@all_produto');

Route::get('/unactive_produto/{p_id}','ProdutoController@unactive_produto');

Route::get('/active_produto/{p_id}','ProdutoController@active_produto');

Route::get('/edit_produto/{p_id}','ProdutoController@edit_produto');

Route::get('/update_produto/{p_id}','ProdutoController@update_produto');

Route::get('/delete_produto/{p_id}','ProdutoController@delete_produto');

//slider routes



Route::get('/add_slider','SliderController@index');
Route::post('/save_slider',[
    'as'=>'save_slider',
    'uses'=>'SliderController@save_slider']);
Route::get('/all_sliders','SliderController@all_sliders');
Route::get('/unactive_slider/{slide_id}','SliderController@unactive_slider');
Route::get('/active_slider/{slide_id}','SliderController@active_slider');
Route::get('/delete_slider/{slide_id}','SliderController@delete_slider');





