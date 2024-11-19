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
        Schema::connection('external_pgsql')->create('cadastro_turista', function (Blueprint $table) {
            $table->id('id_turista');
            $table->string('turista_cpf');
            $table->string('turista_passaporte')->nullable();
            $table->string('turista_nome');
            $table->string('turista_email')->nullable();
            $table->string('turista_fone1');
            $table->string('turista_fone2')->nullable();
            $table->date('turista_data_nascimento')->nullable();
            $table->string('turista_sexo')->nullable();
            $table->string('turista_tipo_sangue')->nullable();
            $table->string('turista_endereco_cep')->nullable();
            $table->string('turista_endereco')->nullable();
            $table->string('turista_endereco_bairro')->nullable();
            $table->smallInteger('turista_endereco_numero')->nullable();
            $table->string('turista_necessidade_esp')->nullable();
            $table->boolean('turista_dependente')->default(false);
            $table->boolean('turista_estrangeiro')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('external_pgsql')->dropIfExists('cadastro_turista');
    }
};
