<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("producto_id")->unsigned();
            $table->integer("cantidad");
            $table->decimal("precio_venta");
            $table->decimal("precio_total");
            $table->bigInteger("user_id")->unsigned();
            $table->foreign("user_id")->references('id')->on('users');
            $table->foreign("producto_id")->references('id')->on('productos');

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
        Schema::dropIfExists('venta');
    }
};
