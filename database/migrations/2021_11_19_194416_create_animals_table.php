<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('dangerous'); //Se crea columna de peligrosidad
            $table->integer('age'); //Se crea columna de edad
            $table->UnsignedBigInteger('corral_id'); //Se crea columna del id del corral al que pertenece
            $table->foreign('corral_id')->references('id')->on('corrals'); //Se crea una llave foranea del id en la columna de corrales
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
        Schema::dropIfExists('animals');
    }
}
