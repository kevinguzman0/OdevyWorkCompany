<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProveedorHasProducto extends Model
{
	protected $table = 'proveedor_has_productos';

    protected $fillable = [
    	'id',
        'idProveedor',
        'idProducto',
    ];
    
    protected $primaryKey = 'id';

}
