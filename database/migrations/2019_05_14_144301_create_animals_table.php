<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('id')->unique();
            $table->string('nome')->nullable();
            $table->string('dt_nascimento');
            $table->string('sexo');
            $table->string('classificacao');
            $table->string('raca');
            $table->string('filho')->nullable();
            $table->string('mother')->nullable();
            $table->string('father')->nullable();
            $table->string('status')->nullable();
            $table->string('profile')->nullable();
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
