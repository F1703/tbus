<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parada extends Model
{
    //
    protected $table = 'parada';
    protected $fillable = ['parada','idlocalidad'];

    public function localidad(){
      return $this->belongsTo('App\Localidad');
    }


    public function horario_n(){
      return $this->hasMany('App\Horario_ns');
    }
}
