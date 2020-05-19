<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedor';

    protected $fillable = [
        'id',
        'empresa',
        'pais',
        'ciudad',
        'email',
        'url',
        'telefono1',
        'telefono2',
        'codigoPostal',
    ];

    protected $primaryKey = 'id';
}
