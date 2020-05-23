<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
   
    protected $table = 'cliente';
    protected $primaryKey = 'id_cliente';
    protected $keyType = 'string';
    public $incrementing = false;

    public $timestamps = false;
    const UPDATED_AT = null;
}
