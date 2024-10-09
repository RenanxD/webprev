<?php

namespace App\Models\Configuracoes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobrancas extends Model
{
    use HasFactory;

    protected $table = 'cadastro_cobranca';

    protected $primaryKey = 'id_cobranca';

    protected $fillable = [
        'id_tipo_cobranca',
        'cobranca_descricao',
        'cobranca_valor',
        'cobranca_perm_minima',
        'cobranca_vlr_adicional',
        'cobranca_perm_dia_adicional',
        'cobranca_ativa'
    ];

    protected $connection = 'internal_pgsql';

    public function tipoCobranca()
    {
        return $this->belongsTo(TipoCobranca::class, 'id_tipo_cobranca', 'id_tipo_cobranca');
    }
}
