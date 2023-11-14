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
        Schema::create('datos_de_pagos', function (Blueprint $table) {
            $table->id();

            $table->decimal('matricula', 8, 2)->nullable();
            $table->decimal('matricula_anterior', 8, 2)->nullable();
            $table->decimal('multa', 8, 2)->nullable();
            $table->decimal('multa_por_suspension', 8, 2)->nullable();
            $table->decimal('habilitaciones', 8, 2)->nullable();
            $table->decimal('supervisiones', 8, 2)->nullable();
            $table->decimal('ioma', 8, 2)->nullable();
            $table->decimal('cursos', 8, 2)->nullable();
            $table->decimal('carpeta_especialidad', 8, 2)->nullable();
            $table->decimal('escuelas', 8, 2)->nullable();
            $table->decimal('pago_cuentas', 8, 2)->nullable();
            $table->decimal('otros_pagos', 8, 2)->nullable();
            $table->decimal('importe_total', 8, 2)->nullable();
            $table->decimal('pago_enviado', 8, 2)->nullable();
            $table->enum('estado', ['pendiente', 'aprobado', 'rechazado', 'en_proceso'])->default('en_proceso');
            $table->string('motivos')->nullable();
            $table->boolean('visto')->default(false);
            $table->string('image_path')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('matriculado_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('matriculado_id')->references('id')->on('matriculados')->onDelete('cascade');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_de_pagos');
    }
};
