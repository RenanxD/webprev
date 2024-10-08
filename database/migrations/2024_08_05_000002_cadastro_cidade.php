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
        Schema::connection('external_pgsql')->create('cadastro_cidade', function (Blueprint $table) {
            $table->id('id_cidade');
            $table->unsignedBigInteger('id_estado');
            $table->string('cidade_descricao');
            $table->string('slug')->unique();
            $table->string('cidade_imagem')->nullable();
            $table->timestamps();

            $table->foreign('id_estado')->references('id_estado')->on('cadastro_estado')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('external_pgsql')->dropIfExists('cadastro_cidade');
    }
};
