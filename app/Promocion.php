<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $table ='oferta';
    protected $fillable = ['id_oferta','id_produc','fech_ini','hora_ini','fech_ter','hora_ter','desc'];
    protected $hidden = [
        'remember_token',
    ];
}
