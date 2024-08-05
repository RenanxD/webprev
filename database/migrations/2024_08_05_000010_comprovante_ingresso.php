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
        Schema::connection('internal_pgsql')->create('comprovante_ingresso', function (Blueprint $table) {
            $table->id('id_ingresso');
            $table->unsignedBigInteger('id_lancamento');
            $table->unsignedBigInteger('id_turista')->unique();
            $table->unsignedBigInteger('id_cidade')->unique();
            $table->unsignedBigInteger('id_atracao');
            $table->string('comprovante_hash');
            $table->string('comprovante_numero');
            $table->boolean('comprovante_ativo')->default(true);
            $table->date('comprovante_data_inicio');
            $table->date('comprovante_data_fim');
            $table->dateTime('comprovante_data_emissao');
            $table->timestamps();

            $table->foreign('id_lancamento')->references('id_lancamento')->on('lancamento_cobranca')->onDelete('cascade');
            $table->foreign('id_atracao')->references('id_atracao')->on('cadastro_atracoes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('internal_pgsql')->dropIfExists('comprovante_ingresso');
    }
};
