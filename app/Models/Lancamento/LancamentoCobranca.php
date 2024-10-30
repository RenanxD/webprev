<?php

namespace App\Models\Lancamento;

use Illuminate\Database\Eloquent\Model;

class LancamentoCobranca extends Model
{
    protected $table = 'lancamento_cobranca';

    protected $connection = 'internal_pgsql';

    protected $fillable = [
        'id_cobranca',
        'id_turista',
        'id_cobranca_bb',
        'lancamento_valor',
        'lancamento_data_gerado',
        'lancamento_data_pago',
        'lancamento_codigo_barras',
        'lancamento_codigo_pix',
        'lancamento_pago',
        'lancamento_ativo',
        'data_inicio',
        'data_fim',
    ];

    protected $primaryKey = 'id_lancamento';
}
