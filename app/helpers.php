<?php
 
use App\Carrito;

if (! function_exists('cantidad_producto_carrito')) {
    function cantidad_producto_carrito()
    {
    	$idUser = auth()->id();
        $cantidadCarrito = Carrito::all()->where('idUser', $idUser)->count();

        return $cantidadCarrito;
    }
}