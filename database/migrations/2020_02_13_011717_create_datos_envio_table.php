<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosEnvioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_envio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apellidos');
            $table->integer('telefono1');
            $table->integer('telefono2');
            $table->string('tipoDeDocumento');
            $table->integer('numeroDeDocumento');
            $table->string('direccion');
            $table->string('barrio');
            $table->string('departamento');
            $table->string('municipio');
            $table->string('pais');
            $table->string('instruccionesEspeciales');
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
        Schema::dropIfExists('datos_envio');
    }
}
