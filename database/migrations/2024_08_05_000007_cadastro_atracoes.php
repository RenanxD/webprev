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
        Schema::connection('internal_pgsql')->create('cadastro_atracoes', function (Blueprint $table) {
            $table->id('id_atracao');
            $table->unsignedBigInteger('id_cidade')->unique();
            $table->string('atracao_descricao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('internal_pgsql')->dropIfExists('cadastro_atracoes');
    }
};
