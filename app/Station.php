<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    public function estadoModel()
    {
    	return $this->belongsTo(Estado::class,'estado_id');
    }
    public function cpaccModel()
    {
    	return $this->belongsTo(Cpacc::class,'cpacc_id');
    }
    
    public function channeltvModel()
    {
    	return $this->belongsTo	(Channeltv::class,'channeltv_id');
    }

   public function listaEncargadosModel()
   {
        return $this->hasMany(Encargado::class,'cpacc_id');
   }
}



