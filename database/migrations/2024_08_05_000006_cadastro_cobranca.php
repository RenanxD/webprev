<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('internal_pgsql')->create('cadastro_cobranca', function (Blueprint $table) {
            $table->id('id_cobranca');
            $table->unsignedBigInteger('id_tipo_cobranca');
            $table->string('cobranca_descricao');
            $table->decimal('cobranca_valor', 10, 2);
            $table->smallInteger('cobranca_perm_minima');
            $table->decimal('cobranca_vlr_adicional', 10, 2);
            $table->smallInteger('cobranca_perm_dia_adicional');
            $table->boolean('cobranca_ativa')->default(true);
            $table->timestamps();

            $table->foreign('id_tipo_cobranca')->references('id_tipo_cobranca')->on('tipo_cobranca')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('internal_pgsql')->dropIfExists('cadastro_cobranca');
    }
};
