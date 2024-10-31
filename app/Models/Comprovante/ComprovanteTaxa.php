<?php

namespace App\Models\Comprovante;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprovanteTaxa extends Model
{
    use HasFactory;

    protected $table = 'comprovante_taxa';

    protected $connection = 'internal_pgsql';

    protected $fillable = [
        'id_lancamento',
        'id_turista',
        'id_cidade',
        'comprovante_hash',
        'comprovante_numero',
        'comprovante_ativo',
        'comprovante_data_inicio',
        'comprovante_data_fim',
        'comprovante_data_emissao',
    ];

    protected $primaryKey = 'id_comprovante';
}
