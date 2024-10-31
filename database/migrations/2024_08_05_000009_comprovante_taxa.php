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
        Schema::connection('internal_pgsql')->create('comprovante_taxa', function (Blueprint $table) {
            $table->id('id_comprovante');
            $table->unsignedBigInteger('id_lancamento');
            $table->unsignedBigInteger('id_turista');
            $table->unsignedBigInteger('id_cidade');
            $table->string('comprovante_hash');
            $table->string('comprovante_numero');
            $table->boolean('comprovante_ativo')->default(true);
            $table->date('comprovante_data_inicio');
            $table->date('comprovante_data_fim');
            $table->dateTime('comprovante_data_emissao');
            $table->timestamps();

            $table->foreign('id_lancamento')->references('id_lancamento')->on('lancamento_cobranca')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('internal_pgsql')->dropIfExists('comprovante_taxa');
    }
};
