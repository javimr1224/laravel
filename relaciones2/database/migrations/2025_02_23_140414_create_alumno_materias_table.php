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
        Schema::create('alumno_materias', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('alumno_id')
            ->nullable()
            ->constrained('alumnos')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreignId('materia_id')
            ->nullable()
            ->constrained('materias')
            ->cascadeOnUpdate()
            ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumno_materias');
    }
};
