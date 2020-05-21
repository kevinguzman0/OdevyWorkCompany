<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Producto;
use App\Categoria;
use App\Caracteristica;
use App\ImageProduct;
use App\ImageCategory;
use App\ProductoHasCaracteristica;
use App\ProveedorHasProducto;
use App\Oferta;
use App\Proveedor;
use Input;

class CreateController extends Controller
{
	
#--------------------------------------------------------------------------------------------
    public function formularioProductos(){

    	$categorias = Categoria::all();
    	$caracteristicas = Caracteristica::all();
    	return view('forms.registrarProducto', compact('categorias', 'caracteristicas'));

    }

    public function registrarProductos(Request $request){

        $validatedData = Validator::make($request->all(),
            [
                'categoria' => 'required',
                'caracteristicas' => 'required',
                // 'imagen'=> 'mimes:jpeg,bmp,png,gif,jfif,mp4|max:5120',
                'nombre' => 'required',
                'descripcionProducto' => 'required',
                'oferta' => 'required',
                'precioUnitario' => 'required',
                'precioAbsoluto' => 'required',
            ]);

        $archivo = $_FILES['file'];

        //agregar en una variable el nombre de la imagen
        $nombre = $archivo['name'];

        //tipo de imagen (jpg, png)
        $tipo = $archivo['type'];


        if($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png" || $tipo == "image/gif"){
            
            
                if(!is_dir('imgProducto')){
                    mkdir('imgProducto', 0777) or die('no se pudo crear');
                }else{
                    echo "la carpeta ya esta creada";
                }


                //coger el archivo y guardarlo
                
                move_uploaded_file($archivo['tmp_name'], 'imgProducto/'.$nombre);
            
        }else{
           
            echo "<h1>Sube una imagen con un formato correcto, por favor...</h1>";
        }
        $producto = new Producto;

        $mensaje = 'Producto registrado correctamente.';

        if($validatedData->fails())
        {
            return redirect()->back()->withInput()->withErrors($validatedData);
        }
        else{
            $producto->idCategoria = $request->categoria;
            $producto->idCaracteristica = $request->caracteristicas;
            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcionProducto;
            $producto->oferta = $request->oferta;
            $producto->precioUnitario = $request->precioUnitario;
            $producto->precioAbsoluto = $request->precioAbsoluto;

            $producto->save();

            // if ($request->hasfile('imagen'))
            // {
            //     $file = $request->file('imagen');
            //     $path = $request->imagen->store('public/fotosProductos');
            //     //Storage::disk('public')->delete('\\fotosProductos\\' . $file);
            //     $ext = $request->file('imagen')->getClientOriginalExtension();
            //     $archivo = 'imagen-id-' . $producto->id . '.' . $ext;
            //     $idProducto = $producto->id;
            //     ImageProduct::create([
            //         'path' => $archivo,
            //         'idProducto' => $idProducto]);

            //     /*

            //     $archivo = $producto->imagen;
            //     Storage::disk('public')->delete('\\fotosProductos\\' . $archivo);

            //     $file = $request->file('imagen');
            //     $ext = $request->file('imagen')->getClientOriginalExtension();
            //     $archivo = 'foto-id-' . $producto->id . '.' . $ext;
            //     $producto->imagen = strtolower($imagen);
            //     Storage::disk('public')->put('\\fotosProductos\\' . $archivo, File::get($file));*/

            // }

            return redirect()->back()->with('mensajeVerde', $mensaje);
        }
    }

#---------------------------------------------------------------------------------------------

#---------------------------------------------------------------------------------------------

    public function formularioCategoria(){

        $categorias = Categoria::all();
    	return view('forms.registrarCategoria', compact('categorias'));

    }

    public function registrarCategoria(Request $request){
       

        $validatedData = Validator::make($request->all(),
            [
                'imagenes'=> 'mimes:jpg,jpeg,bmp,png,gif,jfif,mp4|max:5120',
                'nombre' => 'required',
                'descripcion' => 'required',               
                
            ]);

        $urlImagenes = [];

        if ($request->hasfile('imagenes')) {

            $imagenes = $request->file('imagenes');

            foreach ($imagenes as $imagen) {

                $nombre = time().'_.'.$imagen->getClientOriginalName();
                $ruta = public_path().'/storage/fotosCategorias';
                $imagen->move($ruta, $nombre);
                $urlImagenes[]['url'] = 'fotosCategorias/'.$nombre;
            }
        }

        $categoria = new Categoria;
        $imagenCategoria = new ImageCategory;


        $mensaje = 'Categoria registrada correctamente.';

        if($validatedData->fails())
        {
            return redirect()->back()->withInput()->withErrors($validatedData);
        }
        
        else{

            $categoria->nombre = $request->nombre;
            $categoria->descripcion = $request->descripcion;
            $categoria->save();

            $imagenCategoria->path=$urlImagenes;
            $imagenCategoria->idCategoria = $categoria->id;

            $imagenCategoria->save();

            $mensaje = 'Categoria registrada correctamente.';

            return redirect()->back()->with('mensajeVerde', $mensaje);
        }       
    }


#---------------------------------------------------------------------------------------------

    public function formularioDetalle(){

        $detalles = Caracteristica::all();
        $productos = Producto::all();
        return view('forms.registrarDetalle', compact('detalles', 'productos'));

    }

    public function registrarDetalle(Request $request){
       

        $validatedData = Validator::make($request->all(),
            [
                'tipo'=> 'required',              
                
            ]);

        $detalle = new Caracteristica;

        $mensaje = 'Detalle registrado correctamente.';

        if($validatedData->fails())
        {
            return redirect()->back()->withInput()->withErrors($validatedData);
        }
        else{
            
            $detalle->tipo = $request->tipo;
            $detalle->save();
            
            $mensaje = 'Detalle registrado correctamente.';

            return redirect()->back()->with('mensajeVerde', $mensaje);
        }       
    }

    public function añadirDetalle(Request $request)
    {
        $validatedData = Validator::make($request->all(),
            [
                'valor'=> 'required',
                'detalles' => 'required',
                'productos' => 'required', 
                
            ]);

        $detalleEnProducto = new ProductoHasCaracteristica;

        $mensaje = 'Detalle añadido a producto correctamente.';

        if($validatedData->fails())
        {
            return redirect()->back()->withInput()->withErrors($validatedData);
        }
        else{
            
            $detalleEnProducto->idProducto = $request->productos;
            $detalleEnProducto->valor = $request->valor;
            $detalleEnProducto->idCaracteristica = $request->detalles;
            $detalleEnProducto->save();
            
            $mensaje = 'Detalle añadido a producto correctamente.';

            return redirect()->back()->with('mensajeVerde', $mensaje);
        } 
    }

#---------------------------------------------------------------------------------------------

#---------------------------------------------------------------------------------------------

    public function formularioOferta(){

        $productos = Producto::all();
        return view('forms.registrarOferta', compact('productos'));

    }

    public function registrarOferta(Request $request){
       

        $validatedData = Validator::make($request->all(),
            [
                'productos' => 'required',      
                'precioOferta' => 'required|numeric',
                'descripcionProducto' => 'required',
                'tiempoOferta' => 'required',
                
            ]);

        $oferta = new Oferta;

        $mensaje = 'Oferta registrada correctamente.';

        if($validatedData->fails())
        {
            return redirect()->back()->withInput()->withErrors($validatedData);
        }
        else{
            
            $oferta->idProducto = $request->productos;
            $oferta->precioOferta = $request->precioOferta;
            $oferta->detalle = $request->descripcionProducto;
            $oferta->tiempoOferta = $request->tiempoOferta;
            $oferta->save();
            
            $mensaje = 'Oferta registrada correctamente.';

            return redirect()->back()->with('mensajeVerde', $mensaje);
        }       
    }

#---------------------------------------------------------------------------------------------

#---------------------------------------------------------------------------------------------

    public function formularioProveedor(){

        $proveedores = Proveedor::all();
        $productos = Producto::all();
        return view('forms.registrarProveedor', compact('proveedores', 'productos'));

    }

    public function registrarProveedor(Request $request){
       

        $validatedData = Validator::make($request->all(),
            [
                'empresa' => 'required',      
                'pais' => 'required',
                'ciudad' => 'required',
                'email' => 'required|email',
                'url' => 'required',
                'telefono1' => 'required|numeric|min:1000000000|max:9999999999',
                'telefono2' => 'required|numeric|min:1000000000|max:9999999999',
                'codigoPostal' => 'required|numeric|min:100000|max:999999',
                
            ]);

        $proveedor = new Proveedor;

        $mensaje = 'Proveedor registrado correctamente.';

        if($validatedData->fails())
        {
            return redirect()->back()->withInput()->withErrors($validatedData);
        }
        else{
            
            $proveedor->empresa = $request->empresa;
            $proveedor->pais = $request->pais;
            $proveedor->ciudad = $request->ciudad;
            $proveedor->email = $request->email;
            $proveedor->url = $request->url;
            $proveedor->telefono1 = $request->telefono1;
            $proveedor->telefono2 = $request->telefono2;
            $proveedor->codigoPostal = $request->codigoPostal;
            $proveedor->save();
            
            $mensaje = 'Proveedor registrado correctamente.';

            return redirect()->back()->with('mensajeVerde', $mensaje);
        }       
    }

    public function registrarProductoAProveedor(Request $request)
    {
        $validatedData = Validator::make($request->all(),
            [
                'proveedor'=> 'required',
                'producto' => 'required', 
                
            ]);

        $productoEnProveedor = new ProveedorHasProducto;

        $mensaje = 'Producto añadido a proveedor correctamente.';

        if($validatedData->fails())
        {
            return redirect()->back()->withInput()->withErrors($validatedData);
        }
        else{
            
            $productoEnProveedor->idProducto = $request->producto;
            $productoEnProveedor->idProveedor = $request->proveedor;
            $productoEnProveedor->save();
            
            $mensaje = 'Producto añadido a proveedor correctamente.';

            return redirect()->back()->with('mensajeVerde', $mensaje);
        } 
    }

#---------------------------------------------------------------------------------------------

}
