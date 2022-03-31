<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('Nombre',30);
            $table->string('CP',5);
            $table->string('Colonia');
            $table->string('Calle');
            $table->string('Referencias');
            $table->string('NumExterior');
            $table->string('NumInterior')->nullable();
            $table->string('Telefono',10);
            $table->string('Ciudad');
            $table->string('Municipio');
            $table->string('Estado');
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
        Schema::dropIfExists('direccions');
    }
}
