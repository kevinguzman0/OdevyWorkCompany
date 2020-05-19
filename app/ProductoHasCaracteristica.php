<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoHasCaracteristica extends Model
{
    protected $table = 'producto_has_caracteristicas';

    protected $fillable = [
    	'id',
        'idProducto',
        'valor',
        'idCaracteristica',
    ];

    protected $primaryKey = 'id';

}
