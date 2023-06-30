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
        Schema::create('configuracion_matriculas', function (Blueprint $table) {
            $table->id();
            $table->decimal('precio_matricula');
            $table->date('fecha_vencimiento');
            $table->date('fecha_segundo_vencimiento');
            $table->decimal('recargo_despues_vencimiento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuracion_matriculas');
    }
};
