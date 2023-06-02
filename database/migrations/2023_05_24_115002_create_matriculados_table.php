<?php

use App\Models\Matriculado;
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
        Schema::create('matriculados', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_matriculacion')->nullable();
            $table->string('matricula')->nullable();
            $table->unsignedBigInteger('distrito_matriculas_id');
            $table->unsignedBigInteger('distrito_revistas_id');
            $table->enum('genero', [Matriculado::GENERO_MASCULINO, Matriculado::GENERO_FEMENINO])->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->enum('estado_observacion', [Matriculado::RECEPCIONADO, Matriculado::OTRO])->nullable();
            $table->unsignedBigInteger('situacion_revistas_id');
            $table->unsignedBigInteger('situacion_revista_motivos_id');
            $table->date('situacion_de_revista_fecha')->nullable();
            $table->unsignedBigInteger('nationalities_id');
            $table->enum('tipo_documento', [Matriculado::DNI, Matriculado::LE, Matriculado::LC, Matriculado::CI])->default(Matriculado::DNI)->nullable();
            $table->string('documento_nro')->nullable();
            $table->string('cuit')->nullable();
            $table->string('domicilio_particular', 256)->nullable();
            $table->string('domicilio_particular_codigo_postal')->nullable();
            $table->string('domicilio_particular_localidad', 256)->nullable();
            $table->string('domicilio_particular_municipio', 256)->nullable();
            $table->string('domicilio_particular_telefonos')->nullable();
            $table->string('domicilio_particular_telefonos_alternativo')->nullable();
            $table->string('domicilio_profesional_telefonos_alternativo')->nullable();
            $table->string('domicilio_profesional', 256)->nullable();
            $table->string('domicilio_profesional_codigo_postal')->nullable();
            $table->string('domicilio_profesional_localidad', 256)->nullable();
            $table->string('domicilio_profesional_municipio', 256)->nullable();
            $table->string('domicilio_profesional_telefonos')->nullable();
            $table->unsignedBigInteger('titulo_universitarios_id');
            $table->unsignedBigInteger('universities_id');
            $table->date('fecha_expedicion_titulo')->nullable();
            $table->date('fecha_ejercicio_desde')->nullable();
            $table->date('fecha_terminacion_estudios')->nullable();
            $table->string('actuacion_gp_cdd')->nullable();
            $table->string('actuacion_gp_cs')->nullable();
            $table->string('actuacion_gp_tdd')->nullable();
            $table->string('actuacion_gp_tsd')->nullable();
            $table->string('registrado_tomo')->nullable();
            $table->string('registrado_folio')->nullable();
            $table->enum('categoria', [Matriculado::A, Matriculado::B, Matriculado::C])->nullable();
            $table->longText('observaciones')->nullable();
            $table->unsignedBigInteger('users_id');

            $table->index('matricula');

            $table->foreign('users_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('distrito_matriculas_id')->references('id')->on('distrito_matriculas')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('universities_id')->references('id')->on('universities')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nationalities_id')->references('id')->on('nationalities')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('titulo_universitarios_id')->references('id')->on('titulo_universitarios')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('distrito_revistas_id')->references('id')->on('distrito_revistas')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('situacion_revistas_id')->references('id')->on('situacion_revistas')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('situacion_revista_motivos_id')->references('id')->on('situacion_revista_motivos')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculados');
    }
};
