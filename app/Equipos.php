<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['code', 'nombre', 'availability', 'sede', 'persona', 'descripcion'];
}
