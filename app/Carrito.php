<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carrito';

    protected $fillable = [
        'id',
        'idProducto',
        'cantidad',
        'total',
    ];

    protected $primaryKey = 'id';

    public function producto()
    {
       return $this->hasMany('App\Producto', 'idProducto', 'id'); 
    }
}
