<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    //
    protected $table = 'localidad';
    protected $fillable = ['localidad'];

    public function parada(){
      return $this->hasMany('App\Parada');
    }
}
