<?php

namespace App\Models\Turista;

use Illuminate\Database\Eloquent\Model;

class Turista extends Model
{
    protected $table = 'cadastro_turista';

    protected $connection = 'external_pgsql';

    protected $fillable = [
        'turista_cpf',
        'turista_passaporte',
        'turista_nome',
        'turista_email',
        'turista_fone1',
        'turista_fone2',
        'turista_data_nascimento',
        'turista_sexo',
        'turista_tipo_sangue',
        'turista_endereco_cep',
        'turista_endereco',
        'turista_endereco_bairro',
        'turista_endereco_numero',
        'turista_necessidade_esp',
        'turista_dependente',
        'turista_estrangeiro',
    ];

    protected $primaryKey = 'id_turista';
}
