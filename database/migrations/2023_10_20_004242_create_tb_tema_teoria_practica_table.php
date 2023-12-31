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
    Schema::create('tema_teoria_practicas', function (Blueprint $table) {
      $table->id();
      $table->boolean('visibilidad')->default(true);
      $table->unsignedBigInteger('id_tema_fk')->nullable();
      $table->unsignedBigInteger('id_teoria_fk')->nullable();
      $table->unsignedBigInteger('id_practica_fk')->nullable();
      $table->unsignedBigInteger('id_img_fk')->nullable();
      $table->timestamps();

      $table->foreign('id_tema_fk')->references('id')->on('temas')->onDelete('set null');
      $table->foreign('id_teoria_fk')->references('id')->on('teorias');
      $table->foreign('id_practica_fk')->references('id')->on('practicas');
      $table->foreign('id_img_fk')->references('id')->on('imagenes');
    });
  }

  /**
   * Revertir las migraciones
   */
  public function down(): void
  {
    Schema::dropIfExists('tb_tema_teoria_practica');
  }
};
