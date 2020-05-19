<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetodoDePago extends Model
{
    protected $table = 'metodos_de_pago';

    protected $fillable = [
        'tipo',
    ];

    protected $primaryKey = 'id';
}
