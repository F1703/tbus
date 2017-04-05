<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario_n extends Model
{
    //
    protected $table = 'horario_ns';
    protected $fillable = ['hora_ns','idservicio','idparada','idtipo'];

    public function servicio(){
      return $this->belongTo('App\Servicio');
    }

    public function tipo(){
      return $this->belongsTo('App\Tipo');
    }

    public function parada(){
      return $this->belongsTo('App\Parada');
    }


    public function scopeBusqueda($query,$o,$h){
      if ($o<$h) {
        return $query->where('idparada','=',$o);
        # code...
      }else{
        return $query->where('idparada','=',$h);
      }
    }

}
