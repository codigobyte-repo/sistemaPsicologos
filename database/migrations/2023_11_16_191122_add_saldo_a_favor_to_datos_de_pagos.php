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
        Schema::table('datos_de_pagos', function (Blueprint $table) {
            $table->decimal('saldo_a_favor', 8, 2)->nullable()->after('pago_enviado');
            $table->decimal('saldo_negativo', 8, 2)->nullable()->after('saldo_a_favor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('datos_de_pagos', function (Blueprint $table) {
            //
        });
    }
};
