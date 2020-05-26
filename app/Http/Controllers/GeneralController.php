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

        return view('general.carrito', compact('misProductosCarrito'));

        /*
        //$carros = Carrito::all();
        //$carrito = Carrito::all()->count();
        
        $productos = Producto::find($idProducto);
        $carrito = session()->get('carrito');

        if ($carrito){

            $carrito = [
                $idProducto => [
                    "nombre" => $productos->nombre,
                    "cantidad" => 1,
                    "precio" => $productos->precioUnitario
                    //"foto" => $productos->foto
                ]
            ];

            session()->put('carrito', $carrito);
            return redirect()->back()->with('succcess', 'Producto agragado al carrito de compras');
        }
        if (isset($carrito[$idProducto])){
            $carrito[$idProducto]['cantidad']++;
            session()->put('carrito', $carrito);
            return redirect()->back()->with('succcess', 'Producto agragado al carrito de compras');
        }

        $carrito[$idProducto] = [
            "nombre" => $productos->nombre,
            "cantidad" => 1,
            "precio" => $productos->precioUnitario
            //"foto" => $productos->foto   si la deshabilita dedebe ponerle la coma al anterio
        ];

        session()->put('carrito', $carrito);

        return redirect()->back()->with('succcess', 'Producto agragado al carrito de compras');*/
    }

    public function agregarAlCarrito($idProducto)
    {
        $productoCarrito = DB::table('productos')->where('id', $idProducto)->first();

        $dobleProducto = Carrito::all()->where('idUser', auth()->id())->first();

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

}
