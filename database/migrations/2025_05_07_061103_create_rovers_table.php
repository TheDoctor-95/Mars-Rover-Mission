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
        Schema::create('rovers', function (Blueprint $table) {
            $table->id();

            $table->integer("x_initial"); //posicion inicial
            $table->integer("y_initial"); //posicion inicial
            $table->string("direction_initial"); //DIRECTION INICIAL

             $table->unsignedBigInteger('planet_id')->nullable();
            $table->foreign('planet_id')->references('id')->on('planets');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rovers');
    }
};
