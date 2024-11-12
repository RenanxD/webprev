<?php

namespace App\Models\Turista;

use Illuminate\Database\Eloquent\Model;

class Dependente extends Model
{
    protected $table = 'cadastro_dependente';

    protected $connection = 'external_pgsql';

    protected $fillable = [
        'id_turista',
        'dependente_estrangeiro',
        'dependente_cpf',
        'dependente_passaporte',
        'dependente_nome',
        'dependente_tipo',
        'dependente_celular',
        'dependente_data_nascimento',
        'dependente_sexo',
        'dependente_tipo_sangue',
        'dependente_necessidade_esp',
    ];

    protected $primaryKey = 'id_dependente';
}
