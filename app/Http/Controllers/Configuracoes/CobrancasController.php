<?php

namespace App\Http\Controllers\Configuracoes;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacaoCobrancaRequest;
use App\Models\Configuracoes\Cobrancas;
use App\Models\Configuracoes\TipoCobranca;
use Illuminate\Http\Request;

class CobrancasController extends Controller
{
    public function index(Request $request)
    {
        $tiposCobranca = TipoCobranca::all();
        $cobrancaAtual = Cobrancas::where('cobranca_ativa', true)->latest()->first() ?? Cobrancas::latest()->first();
        $ultimaCobrancaAtiva = Cobrancas::where('cobranca_ativa', true)->latest()->skip(1)->first();
        $cobrancas = Cobrancas::paginate(7);
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        $temTipoCobranca = $tiposCobranca->isNotEmpty();

        return view('configuracoes.cobrancas.index', compact('cobrancas', 'cobrancaAtual', 'tiposCobranca', 'ultimaCobrancaAtiva', 'temTipoCobranca'))
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('configuracoes.cobrancas.create');
    }

    public function store(ValidacaoCobrancaRequest $request)
    {
        Cobrancas::create($request->all());
        $request->session()->flash('mensagem.sucesso', 'Nova Cobrança Cadastrada com Sucesso!');

        return redirect()->route('cobrancas.index');
    }

    public function destroy(Cobrancas $cobranca, Request $request)
    {
        $cobranca->delete();
        $request->session()->flash('mensagem.sucesso', 'Cobrança Removida com Sucesso!');

        return redirect()->route('cobrancas.index');
    }

    public function edit(Request $request)
    {
        return view('configuracoes.cobrancas.edit')->with('cobranca', $request);
    }

    public function update(Cobrancas $cobranca, Request $request)
    {
        $cobranca->fill($request->all());
        $cobranca->save();

        return to_route('cobrancas.index')
            ->with('mensagem.sucesso', 'Cobrança Atualizada com Sucesso!');
    }
}
