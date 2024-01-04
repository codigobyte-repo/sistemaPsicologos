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
            $table->decimal('otros_pagos_matricula', 8, 2)->nullable();
            $table->json('meses')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('datos_de_pagos', function (Blueprint $table) {
            $table->dropColumn('otros_pagos_matricula');
            $table->dropColumn('meses');
        });
    }
};
