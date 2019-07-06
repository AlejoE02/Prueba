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

Route::get('Inventario/', [
    'uses' =>'Controller@Inventario',
    'as' => 'Controller.inventario'
]);

Route::get('AgregarProducto/{id?}', [
    'uses' =>'Controller@AgregarProducto',
    'as' => 'Controller.AgregarProducto'
]);

Route::post('AgregarProductos/', [
    'uses' =>'Controller@AgregarProductos',
    'as' => 'Controller.AgregarProductos'
]);