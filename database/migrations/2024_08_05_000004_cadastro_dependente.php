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
        Schema::connection('external_pgsql')->create('cadastro_dependente', function (Blueprint $table) {
            $table->increments('id_dependente');
            $table->unsignedInteger('id_turista');
            $table->boolean('dependente_estrangeiro')->default(false)->nullable();
            $table->string('dependente_cpf');
            $table->string('dependente_passaporte')->nullable();
            $table->string('dependente_nome');
            $table->string('dependente_tipo');
            $table->string('dependente_celular')->nullable();
            $table->date('dependente_data_nascimento')->nullable();
            $table->string('dependente_sexo')->nullable();
            $table->string('dependente_tipo_sangue')->nullable();
            $table->string('dependente_necessidade_esp')->nullable();
            $table->timestamps();

            $table->foreign('id_turista')->references('id_turista')->on('cadastro_turista')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('external_pgsql')->dropIfExists('cadastro_dependente');
    }
};
