<?php

namespace App\UnidadNegocio;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    public function areas()
    {
        return $this->hasMany(Area::class,'dependencia_id','id');
    }
}
