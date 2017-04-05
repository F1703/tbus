<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    //
    protected $table = 'servicio';
    protected $fillable = ['servicio','idlinea'];

    //
    public function linea(){
      return $this->belognsTo('App\Linea');
    }


    public function horario_ns(){
      return $this->hasMany('App\Horario_ns');
    }


    public function scopeFindIdServicio($query,$idservicio){
      return $query->where('idservicio','=', $idservicio);
    }

}
