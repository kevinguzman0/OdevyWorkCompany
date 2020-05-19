<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = 'oferta';

    protected $fillable = [
        'idProducto',
        'precioOferta',
        'descripcion',
        'tiempoOferta',
    ];

    protected $primaryKey = 'id';
}
