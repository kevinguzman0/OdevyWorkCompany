<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compra';

    protected $fillable = [
        'fechaCompra',
        'pais',
        'idDatosDeEnvio',
        'idUsuario',
        'idProducto',
        'cantidad',
        'precioAbsoluto',
        'idMetodoDePago',
    ];

    protected $primaryKey = 'id';
}
