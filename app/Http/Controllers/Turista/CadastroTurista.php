<?php

namespace App\Http\Controllers\Turista;

use App\Http\Controllers\Controller;
use App\Models\Turista\Turista;
use Illuminate\Http\Request;

class CadastroTurista extends Controller
{
    public function submit(Request $request)
    {
        $request->merge([
            'turista_dependente' => $request->turista_dependente === 'sim',
            'turista_estrangeiro' => $request->turista_estrangeiro === 'sim',
        ]);

        $validatedData = $request->validate([
            'turista_cpf' => 'required',
            'turista_passaporte' => 'nullable',
            'turista_nome' => 'required',
            'turista_email' => 'required',
            'turista_fone1' => 'required',
            'turista_fone2' => 'required',
            'turista_data_nascimento' => 'required',
            'turista_sexo' => 'required',
            'turista_tipo_sangue' => 'required',
            'turista_endereco_cep' => 'required',
            'turista_endereco' => 'required',
            'turista_endereco_bairro' => 'required',
            'turista_endereco_numero' => 'required',
            'turista_necessidade_esp' => 'required|boolean',
            'turista_dependente' => 'required|boolean',
            'turista_estrangeiro' => 'required|boolean'
        ]);

        Turista::create($validatedData);

        return response()->json(['success' => 'Formulário enviado com sucesso!']);
    }
}
