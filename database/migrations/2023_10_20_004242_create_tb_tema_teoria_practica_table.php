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
        Schema::create('tb_tema_teoria_practica', function (Blueprint $table) {
            $table->unsignedBigInteger('id_tema_fk')->nullable();
            $table->unsignedBigInteger('id_teoria_fk')->nullable();
            $table->unsignedBigInteger('id_practica_fk')->nullable();
            $table->unsignedBigInteger('id_img_fk')->nullable();
            $table->timestamps();

            $table->foreign('id_tema_fk')->references('id')->on('temas');
            $table->foreign('id_teoria_fk')->references('id')->on('teorias');
            $table->foreign('id_practica_fk')->references('id')->on('practicas');
            $table->foreign('id_img_fk')->references('id')->on('imagenes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_tema_teoria_practica');
    }
};
