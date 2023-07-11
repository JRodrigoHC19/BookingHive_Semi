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
        Schema::create('habitacions', function (Blueprint $table) {
            $table->id();
            $table->integer('id_hab');
            $table->biginteger('id_hotel');
            $table->integer('piso');
            $table->integer('precio');
            $table->integer('capacidad');
            $table->enum('tipo', ['I', 'D', 'F', 'M', 'K']);
            $table->enum('estado', ['D', 'O']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitacions');
    }
};
