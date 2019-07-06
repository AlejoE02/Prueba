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

Route::get('VistaCliente/', [
    'uses' =>'Controller@VistaCliente',
    'as' => 'Controller.VistaCliente'
]);

Route::get('Productos/', [
    'uses' =>'Controller@Productos',
    'as' => 'Controller.productos'
]);

Route::get('VerProductos/',[
    'uses' =>'Controller@VerProductos',
    'as' => 'Controller.VerProductos'
]);

Route::get('Carrito/{id?}',[
    'uses' =>'Controller@Carrito',
    'as' => 'Controller.carrito'
]);

Route::post('Anadir/',[
    'uses' => 'Controller@AnadirProducto',
    'as' => 'Controller.AnadirProducto'
]);

Route::get('Gestionar/',[
    'uses' =>'Controller@GestionarFactura',
    'as' => 'Controller.Gestionar'
]);

Route::get('FinalizarCompra/',[
    'uses' =>'Controller@FinalizarCompra',
    'as' => 'Controller.FinalizarCompra'
]);

Route::get('CancelarCompra/',[
    'uses' =>'Controller@CancelarCompra',
    'as' => 'Controller.CancelarCompra'
]);