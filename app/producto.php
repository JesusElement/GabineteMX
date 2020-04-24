<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $fillable = ['id_produc','id_provee','titutlo','datos','clav_clas'];
}
