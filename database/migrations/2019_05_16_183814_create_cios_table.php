<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_animals')->unsigned();
            $table->foreign('id_animals')->references('id')->on('animals');
            $table->string('dt_cio');
            $table->string('dt_cobertura');
            $table->string('dt_parto_previsto');
            $table->string('dt_parto');
            $table->string('tipo');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('cios');
    }
}
