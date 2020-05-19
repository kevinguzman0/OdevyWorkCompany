<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoPedido extends Model
{
    protected $table = 'estado_pedido';

    protected $fillable = [
        'estado',
    ];

    protected $primaryKey = 'id';
}
