<?php

namespace App\Http\Controllers\Configuracoes;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacaoCobrancaRequest;
use App\Models\Configuracoes\Cobrancas;
use Illuminate\Http\Request;

class CobrancasController extends Controller
{
    public function index(Request $request)
    {
        $cobrancaAtual = Cobrancas::where('cobranca_ativa', true)->latest()->first();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        if (!$cobrancaAtual) {
            $cobrancaAtual = Cobrancas::latest()->first();
        }

        $cobrancas = Cobrancas::paginate(7);

        return view('configuracoes.cobrancas.index', compact('cobrancas', 'cobrancaAtual'))
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('configuracoes.cobrancas.create');
    }

    public function store(ValidacaoCobrancaRequest $request)
    {
        Cobrancas::create($request->all());
        $request->session()->flash('mensagem.sucesso', 'Cobrança criada com sucesso!');

        return view('configuracoes.cobrancas.index')->with('success', 'Nova Cobrança Cadastrada com Sucesso!');
    }

    public function destroy(Cobrancas $cobranca, Request $request)
    {
        $cobranca->delete();
        $request->session()->flash('mensagem.sucesso', 'Cobrança Removida com Sucesso!');

        return view('configuracoes.cobrancas.index');
    }

    public function edit(Request $request)
    {
        return view('configuracoes.cobrancas.edit')->with('cobrancas', $request);
    }

    public function update(Cobrancas $cobranca, Request $request)
    {
        $cobranca->fill($request->all());
        $cobranca->save();

        return view('configuracoes.cobrancas.index')
            ->with('mensagem.sucesso', 'Cobrança Atualizada com Sucesso!');
    }
}
