<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoHasCaracteristicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_has_caracteristicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idProducto')->unsigned();
            $table->string('valor');
            $table->bigInteger('idCaracteristica')->unsigned();
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
        Schema::dropIfExists('producto_has_caracteristicas');
    }
}
