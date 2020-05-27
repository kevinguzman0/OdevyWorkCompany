<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'id',
        'idCategoria',
        'idCaracteristicas',
        'nombre',
        'descripcion',
        'oferta',
        'precioUnitario',
        'precioAbsoluto',
    ];

    protected $primaryKey = 'id';

    public function categoria()
    {
       return $this->hasOne('App\Categoria', 'id', 'id'); 
    }  

    public function imagen()
    {
       return $this->hasMany('App\ImageProduct', 'id', 'idImagen'); 
    } 
}
