<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Franco extends Model
{
    //
    protected $table = 'francos';
    protected $fillable = ['nombre','apellido'];
    
}
