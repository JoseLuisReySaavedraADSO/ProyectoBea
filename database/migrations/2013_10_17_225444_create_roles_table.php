<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Ejecuta las migraciones
   */
  public function up()
  {
    Schema::create('roles', function (Blueprint $table) {
      $table->id();
      $table->string('nom_rol', 250)->nullable();
      $table->timestamps();
    });
  }

  /**
   * revierte las migraciones
   */
  public function down(): void
  {
    Schema::dropIfExists('roles');
  }
};
