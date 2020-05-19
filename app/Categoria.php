<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',   
    ];

    protected $primaryKey = 'id';

    public function imagen()
    {
       return $this->hasMany('App\ImageCategory', 'id', 'idImagen'); 
    }

}
