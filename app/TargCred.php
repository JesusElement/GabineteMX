<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TargCred extends Model
{

    protected $table = 'cli_m_pago';
    protected $primaryKey = 'id_cliente';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    const UPDATED_AT = null;
    protected $fillable = ['id_cliente', 'clave', 'expi', 'num_tar'];
}
