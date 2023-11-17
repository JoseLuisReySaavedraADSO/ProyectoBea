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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rol_fk')->default(1);
            $table->string('nombre', 250)->nullable();
            $table->string('telefono', 250)->nullable();
            $table->string('num_doc', 250)->unique();
            $table->string('tipo_doc', 250);
            $table->string('email', 250)->unique();
            $table->string('correo_alt', 250);
            $table->string('regional', 250);
            $table->date('fecha_nac');
            $table->string('centro_form', 250);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_rol_fk')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
