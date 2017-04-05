<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    //
    protected $table = 'tipo';
    protected $fillable = ['tipo'];


    public function horario_ns(){
      return $this->hasMany('App\Horario_ns');
    }
}
