<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosEnvio extends Model
{
    protected $table = 'datos_envio';

    protected $fillable = [
        'nombre',
        'apellidos',
        'telefono1',
        'telefono2',
        'tipoDeDocumento',
        'numeroDeDocumento',
        'direccion',
        'barrio',
        'departamento',
        'municipio',
        'pais',
        'instruccionesEspeciales',
    ];

    protected $primaryKey = 'id';
}
