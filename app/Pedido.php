<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';

    protected $fillable = [
        'idEstadoPedido',
        'idProveedor',
        'idProductoHasCaracteristicas',
        'cantidad',
    ];

    protected $primaryKey = 'id';
}
