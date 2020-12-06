<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('region')->nullable();//si
            $table->string('provincia')->nullable();//si
            $table->string('distrito')->nullable();//si
            $table->string('localidad')->nullable();//si
            $table->unsignedInteger('channeltv_id')->nullable();//si
            $table->string('frecuencyfm_id')->nullable();//si
            $table->string('altitud')->nullable();//si
            $table->string('latitud')->nullable();//si
            $table->string('longitud')->nullable();//si
            $table->unsignedInteger('cpacc_id')->default(1);// 1 tv , 2 radio, 3 radio y tv
            $table->text('observacion')->nullable(); // observaciones
            $table->text('requerimiento')->nullable();
            $table->unsignedInteger('celular')->nullable();
            $table->string('encargado')->nullable();
            $table->dateTime('fecha')->nullable();
            $table->unsignedInteger('estado_id')->default(1); // 1 inoperativo 2 operativo
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stations');
    }
}
