<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $table = 'proveedor';
    protected $fillable = ['id_provee', 'nom', 'nom_or', 'correo', 'telefono', 'razon_s', 'direccion', 'cp', 'rfc'];
    protected $hidden = [
        'remember_token',
    ];
}
