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
        Schema::create('datos', function (Blueprint $table) {
            $table->id();

            $table->string('razon_social')->nullable();
            $table->string('domicilio_comercial')->nullable();
            $table->string('cuit')->nullable();
            $table->string('condicion_frente_al_iva')->nullable();
            $table->string('punto_venta')->nullable();
            $table->string('ingresos_brutos')->nullable();
            $table->string('fecha_inicio_actividades')->nullable();
            $table->string('condicion_venta')->nullable();
            $table->string('codigo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos');
    }
};
