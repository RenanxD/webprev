<?php

namespace App\Http\Controllers\Configuracoes;

use App\Models\Configuracoes\TipoCobranca;
use Illuminate\Http\Request;

class TipoCobrancaController
{
    public function store(Request $request)
    {
        TipoCobranca::create($request->all());
        return to_route('cobrancas.index')->with('success', 'Tipo de cobrança Cadastrado com Sucesso!');
    }
}
