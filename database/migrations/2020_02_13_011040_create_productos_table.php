<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idCategoria')->unsigned();
            $table->bigInteger('idCaracteristica')->unsigned();
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('cantidad');
            $table->boolean('oferta'); 
            $table->integer('precioUnitario');
            $table->integer('precioAbsoluto');
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
        Schema::dropIfExists('productos');
    }
}
