<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $table ='producto';
    protected $fillable = ['id_produc','id_provee','id_familia','titutlo','datos','clav_clas',];
    protected $hidden = [
        'remember_token',
    ];
}
