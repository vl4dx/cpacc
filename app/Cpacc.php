<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cpacc extends Model
{
   public function caracteristicascpacc()
   {
   		return $this->hasMany(Station::class,'cpacc_id');
   }
}
