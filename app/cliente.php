<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    //
    protected $fillable = ['id_cliente','nom','ape1','ape2','email','telefono','fech_na'];
}
