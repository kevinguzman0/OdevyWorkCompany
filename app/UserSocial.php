<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSocial extends Model
{
    protected $table = 'users_social';

    protected $fillable = [
        'id',
        'idUser',
        'idSocial',
        'servicio',
    ];

    protected $primaryKey = 'id';
}
