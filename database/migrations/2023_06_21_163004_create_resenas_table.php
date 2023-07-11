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
        Schema::create('resenas', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->biginteger('ruc_hotel');
            $table->integer('cal_rep');
            $table->integer('cal_ins');
            $table->integer('cal_hab');
            $table->integer('limp');
            $table->integer('cal_pre');
            $table->integer('rcm_hot');
            $table->string('msg',250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resenas');
    }
};
