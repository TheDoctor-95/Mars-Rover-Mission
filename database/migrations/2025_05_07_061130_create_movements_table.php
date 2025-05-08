<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->string("command_executed");
            $table->string("status");

            $table->integer("x"); //posicion inicial
            $table->integer("y"); //posicion inicial
            $table->string("direction");


             $table->unsignedBigInteger('planet_id')->nullable();
            $table->foreign('planet_id')->references('id')->on('planets');

             $table->unsignedBigInteger('rover_id')->nullable();
            $table->foreign('rover_id')->references('id')->on('rovers');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movements');
    }
};
