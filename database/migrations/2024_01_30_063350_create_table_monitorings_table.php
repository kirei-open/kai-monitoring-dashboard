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
        Schema::create('table_monitorings', function (Blueprint $table) {
            $table->id();
            $table->string('id_ralok');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('section');
            $table->string('input_voltage');
            $table->string('output_voltage');
            $table->string('voltage');
            $table->string('clasification');
            $table->string('power_transmite');
            $table->string('SWR');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_monitorings');
    }
};
