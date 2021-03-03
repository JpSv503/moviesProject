<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service__details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_service')->references('id')->on('servicees')
                ->onDelete('no action')->onUpdate('cascade');
            $table->foreignId('id_movie')->references('id')->on('movies')
                ->onDelete('no action')->onUpdate('cascade');
            $table->integer('cantidad');
            $table->double('sutotal');
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
        Schema::dropIfExists('service__details');
    }
}
