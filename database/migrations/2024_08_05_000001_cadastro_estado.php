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
        Schema::connection('external_pgsql')->create('cadastro_estado', function (Blueprint $table) {
            $table->id('id_estado');
            $table->string('estado_descricao');
            $table->string('estado_sigla');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('external_pgsql')->dropIfExists('cadastro_estado');
    }
};
