<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Ejecutar las migraciones
   */
  public function up()
  {
    Schema::create('secciones', function (Blueprint $table) {
      $table->id();

      $table->string('titulo_seccion', 250)->nullable();
      $table->boolean('visibilidad')->default(true);
      // $table->string('desc_seccion', 250)->nullable();
      $table->timestamps();
    });
  }

  /**
   * Revertir las migraciones
   */
  public function down(): void
  {
    Schema::dropIfExists('secciones');
  }
};
