<?php

Route::get('/', 'GeneralController@verProductos')->name('inicio');

Route::get('salir', 'Auth\LoginController@logout')->name('salir');
 
Route::get('redirect/{provider}', 'Auth\LoginController@redirect')->name('redirect');

Route::get('callback/{provider}', 'Auth\LoginController@callback')->name('callback');

Route::get('notificacion', function(){
	return view('general.notificacion');
})->name('notificacion');
#----------------------------------------------------------------------------------------------------
Route::get('registrar-producto', 'CreateController@formularioProductos')->name('formulario.producto');
Route::post('producto-ingresado', 'CreateController@registrarProductos')->name('ingresar.producto');
#-----------------------------------------------------------------------------------------------------

#-----------------------------------------------------------------------------------------------------
Route::get('registrar-categoria', 'CreateController@formularioCategoria')->name('formulario.categoria');
Route::post('categoria-ingresado', 'CreateController@registrarCategoria')->name('ingresar.categoria');
#-----------------------------------------------------------------------------------------------------

#--------------------------------------------------------------------------------------------------------
Route::get('registrar-detalle', 'CreateController@formularioDetalle')->name('formulario.detalle');
Route::post('detalle-ingresado', 'CreateController@registrarDetalle')->name('ingresar.detalle');
Route::post('añadir-detalle', 'CreateController@añadirDetalle')->name('añadir.detalle');
#--------------------------------------------------------------------------------------------------------

#--------------------------------------------------------------------------------------------------------
Route::get('registrar-oferta', 'CreateController@formularioOferta')->name('formulario.oferta');
Route::post('oferta-ingresado', 'CreateController@registrarOferta')->name('ingresar.oferta');
#--------------------------------------------------------------------------------------------------------

#--------------------------------------------------------------------------------------------------------
Route::get('registrar-proveedor', 'CreateController@formularioProveedor')->name('formulario.proveedor');
Route::post('proveedor-ingresado', 'CreateController@registrarProveedor')->name('ingresar.proveedor');
Route::post('añadir-producto', 'CreateController@registrarProductoAProveedor')->name('añadir.producto');
#-------------------------------------------------------------------------------------------------------

Route::get('añadir-imagen', 'CreateController@crearImagen')->name('añadir.imagen');

Route::resource('productos', 'ProductosController');

#--------------Carro de compras---------------------
Route::get('mostrar-carrito', 'GeneralController@mostrarCarrito')->name('carrito.mostrar');

Route::get('agregar-carrito/{idProducto}' , 'GeneralController@agregarAlCarrito')->name('carrito.agregar');

Route::get('limpiar-carrito' , 'GeneralController@limpiarCarrito')->name('carrito.limpiar');

Route::get('aumentar-carrito/{idProducto}', 'GeneralController@aumentarCantidadProducto')->name('carrito.cantidad.aumentar');

Route::get('disminuir-carrito/{idProducto}', 'GeneralController@disminuirCantidadProducto')->name('carrito.cantidad.disminuir');
#----------------------------------------------------
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
