<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channeltv extends Model
{
    public function caracteristicastv()
   {
   		return $this->hasMany(Station::class,'channeltv_id');
   }
}

