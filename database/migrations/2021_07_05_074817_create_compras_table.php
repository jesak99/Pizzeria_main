<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->foreignId('pedidos_id')->constrained('pedidos');
            $table->foreignId('pizzas_id')->constrained('pizzas');
            $table->integer('cantidad');
            $table->enum('tamanio',['1','1.3','1.7']); 
            $table->decimal('total',$precision = 5,$scale = 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
