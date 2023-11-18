<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecutar las migraciones
     */
    public function up(): void
    {
        Schema::create('teorias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_teoria', 250)->nullable();
            $table->string('desc_teoria', 1000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Revertir las migraciones
     */
    public function down(): void
    {
        Schema::dropIfExists('teorias');
    }
};
