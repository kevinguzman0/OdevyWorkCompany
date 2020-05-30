<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Producto;
use App\Categoria;
use App\Caracteristica;
use App\ImageProduct;
use App\Carrito;
use App\User;
use Input;
use Session;
use Redirect;
use Auth;

class GeneralController extends Controller
{
    public function verProductos(){

    	$productos = Producto::all();
        
    	return view('general.inicio', compact('productos'));

    }
    public function verTablaProductos(){

        $productos = Producto::all();
        
        return view('forms.registrarProducto', compact('productos'));

    }

    public function logueo(Request $request){

    }

    public function registro(Request $request){

        $validatedData = Validator::make($request->all(),
        [
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);

        $user = new User;
        $user->nombre = $request->nombre;
        $user->apellidos = $request->apellidos;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->assignRole('usuario');

        $user->save(); 

        $mensaje = 'Cuenta creada correctamente...';

        return redirect()->back()->with('mensajeVerde', $mensaje);
    }

    public function mostrarCarrito()
    {

        $misProductosCarrito = Carrito::all()->where('idUser', auth()->id());

        //$precioTotal = $misProductosCarrito->cantidad * $misProductosCarrito->producto->precioUnitario;

        return view('general.carrito', compact('misProductosCarrito'));

    }

    public function agregarAlCarrito($idProducto)
    {
        $productoCarrito = Producto::all()->where('id', $idProducto)->first();

        $dobleProducto = Carrito::all()->where('idUser', auth()->id())->where('idProducto', $idProducto)->first();

        if ($dobleProducto) {
            
            if ($idProducto == $dobleProducto->idProducto) {

                $dobleProducto->cantidad = $dobleProducto->cantidad+1;
                $dobleProducto->save();   
            }
            
        }
        
        else{

            $nuevoProductoCarrito = Carrito::create([
                'idProducto' => $productoCarrito->id,
                'idUser' => auth()->id(),
                'cantidad' => 1,
                'total' => $productoCarrito->precioUnitario,
            ]);
        }

        
                
        return redirect()->back();
        
    }

    public function limpiarCarrito(){

        $productoCarrito = Carrito::all();

        foreach ($productoCarrito as $producto) {

            $eliminar = Carrito::find($producto->id)->where('idUser', auth()->id());
            
            $eliminar->delete();

        }

        return redirect()->back();
    }

    public function aumentarCantidadProducto($idProducto)
    {
        $productoCarrito = Carrito::find($idProducto);

        $productoCarrito->cantidad = $productoCarrito->cantidad+1;

        $productoCarrito->save();

        return redirect()->back();
    }

    public function disminuirCantidadProducto($idProducto)
    {
        $productoCarrito = Carrito::find($idProducto);

        $productoCarrito->cantidad = $productoCarrito->cantidad-1;

        $productoCarrito->save();

        return redirect()->back();
    }



}
