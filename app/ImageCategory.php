<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imageCategory extends Model
{
    protected $table = 'imagenCategoria';

    protected $fillable = [
    	'id',
    	'path',
        'idCategoria',
    ];

    protected $primaryKey = 'id';

    public function getUrlPathAttribute()
    {
    	return \Storage::url($this->path);
    }
}
