<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{

    protected $table = 'direccion';
    protected $primaryKey = 'id_direc';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    const UPDATED_AT = null;
}
