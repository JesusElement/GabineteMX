<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreateUser extends Model
{
    //

    public $fillable = ['id_cliente', 'nom', 'ape1','ape2','email','telefono','fech_na','rfc'];
}
