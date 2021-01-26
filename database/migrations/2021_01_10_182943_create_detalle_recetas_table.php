<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleRecetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_recetas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('receta_id')->nullable();
            $table->string('prescripcion', 255);
            $table->string('dosis', 255);
            $table->string('horario', 255);

            $table->foreign('receta_id')
                ->references('id')
                ->on('recetas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_recetas');
    }
}
