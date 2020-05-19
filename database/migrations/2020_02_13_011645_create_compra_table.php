<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fechaCompra');
            $table->string('pais');
            $table->bigInteger('idDatosDeEnvio')->unsigned();
            $table->bigInteger('idUsuario')->unsigned();
            $table->bigInteger('idProducto')->unsigned();
            $table->integer('cantidad');
            $table->integer('precioAbsoluto');
            $table->bigInteger('idMetodoDePago')->unsigned();
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
        Schema::dropIfExists('compra');
    }
}
