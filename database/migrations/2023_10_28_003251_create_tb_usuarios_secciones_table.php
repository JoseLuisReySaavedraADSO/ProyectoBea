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
        Schema::create('tb_usuarios_secciones', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario_fk')->nullable();
            $table->unsignedBigInteger('id_seccion_fk')->nullable();
            $table->timestamps();

            $table->foreign('id_usuario_fk')->references('id')->on('users');
            $table->foreign('id_seccion_fk')->references('id')->on('secciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_usuarios_secciones');
    }
};
