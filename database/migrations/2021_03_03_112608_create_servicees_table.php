<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicees', function (Blueprint $table) {
            $table->id();
            $table->string('correlativo');
            $table->string('fechaPedido');
            $table->double('monto', 6,2);
            $table->string('fechaDevolucion');
            $table->tinyInteger('estado');
            $table->foreignId('id_servicetype')->references('id')->on('service__types')
                ->onDelete('no action')->onUpdate('cascade');
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
        Schema::dropIfExists('servicees');
    }
}
