<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CarroDeCompras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carro_de_compras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_producto')->unsigned();
            $table->foreign('id_producto')
                ->references('id')
                ->on('inventario')
                ->onDelete('cascade');
            $table->Integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->Integer('cantidad');
            $table->integer('estado');
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
        Schema::dropIfExists('carro_de_compras');
    }
}
