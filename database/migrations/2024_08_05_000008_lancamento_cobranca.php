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
        Schema::connection('internal_pgsql')->create('lancamento_cobranca', function (Blueprint $table) {
            $table->id('id_lancamento');
            $table->unsignedBigInteger('id_cobranca');
            $table->unsignedBigInteger('id_turista');
            $table->string('id_cobranca_bb')->unique();
            $table->decimal('lancamento_valor', 10, 2);
            $table->dateTime('lancamento_data_gerado');
            $table->dateTime('lancamento_data_pago')->nullable();
            $table->string('lancamento_codigo_barras');
            $table->string('lancamento_codigo_pix');
            $table->boolean('lancamento_pago')->default(false);
            $table->boolean('lancamento_ativo')->default(true);
            $table->dateTime('data_inicio');
            $table->dateTime('data_fim');
            $table->timestamps();

            $table->foreign('id_cobranca')->references('id_cobranca')->on('cadastro_cobranca')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('internal_pgsql')->dropIfExists('lancamento_cobranca');
    }
};
