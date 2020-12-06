<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public function caracteristicas()
   {
   		return $this->hasMany(Station::class);
   }
}
