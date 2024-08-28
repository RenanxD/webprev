<?php

namespace App\Models\Configuracoes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCobranca extends Model
{
    use HasFactory;

    protected $table = 'tipo_cobranca';
    protected $primaryKey = 'id_tipo_cobranca';

    protected $fillable = [
        'descricao'
    ];

    protected $connection = 'internal_pgsql';
}
