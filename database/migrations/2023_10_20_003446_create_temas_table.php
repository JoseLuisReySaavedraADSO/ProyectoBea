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
    Schema::create('temas', function (Blueprint $table) {
      $table->id();
      $table->boolean('visibilidad')->default(true);
      $table->unsignedBigInteger('id_seccion_fk')->nullable();
      $table->string('titulo_tema', 250)->nullable();
      // $table->string('desc_tema', 250)->nullable();
      $table->timestamps();

      $table->foreign('id_seccion_fk')->references('id')->on('secciones')->onDelete('set null');
    });
  }

  /**
   * Revertir las migraciones
   */
  public function down(): void
  {
    Schema::dropIfExists('temas');
  }
};
