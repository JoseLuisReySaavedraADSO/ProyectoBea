<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
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
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('temas');
  }
};
