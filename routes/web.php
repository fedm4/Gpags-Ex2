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
Route::get('/pagos', 'PagosController@index')->name('pagos');
Route::get('/pago/{codigopago?}', 'PagosController@pago')->name('pago');
Route::post('/pago/{codigopago?}', 'PagosController@guardarPago');
Route::post('/borrarpago/{codigopago}', 'PagosController@borrarPago')->name('borrarpago');

Route::get('/favoritos', 'FavoritosController@index')->name('favoritos');
Route::post('/favorito/{codigousuariofavorito}', 'FavoritosController@guardarFavorito')->name('guardarfavorito');
Route::post('/borrarfavorito/{codigousuariofavorito}', 'FavoritosController@borrarFavorito')->name('borrarfavorito');
