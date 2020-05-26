<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carrito';

    protected $fillable = [
        'id',
        'idProducto',
        'idUser',
        'cantidad',
        'total',
    ];

    protected $primaryKey = 'id';

    public function producto()
    {
       return $this->hasOne('App\Producto', 'id', 'idProducto'); 
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'idUser');
    }
}
