<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Servicio;

class Linea extends Model
{
    //
    protected $table = 'linea';
    protected $fillable = ['linea'];


    public function servicio(){
      return $this->hasMany('App\Servicio');
    }
}
