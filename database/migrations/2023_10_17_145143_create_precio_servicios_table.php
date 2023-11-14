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
        Schema::create('precio_servicios', function (Blueprint $table) {
            $table->id();
            $table->decimal('matricula_actual_categoria_a', 8, 2)->nullable();
            $table->decimal('matricula_actual_categoria_b', 8, 2)->nullable();
            $table->decimal('matricula_actual_categoria_c', 8, 2)->nullable();
            $table->decimal('matricula_actual_fid', 8, 2)->nullable();
            $table->decimal('multa', 8, 2)->nullable();
            $table->decimal('habilitaciones', 8, 2)->nullable();
            $table->decimal('supervisiones_menos_5_anos', 8, 2)->nullable();
            $table->decimal('supervisiones_mas_5_anos', 8, 2)->nullable();
            $table->decimal('supervisiones_forenses', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('precio_servicios');
    }
};
