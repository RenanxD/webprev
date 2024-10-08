<?php

namespace App\Http\Controllers\Turista;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CadastroTurista extends Controller
{
    public function submit(Request $request)
    {
        // Aqui você pode validar e processar os dados recebidos
        $validatedData = $request->validate([
            'turista_cpf' => 'required',
            'turista_passaporte' => 'required',
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
            'turista_necessidade_esp' => 'required',
            'turista_dependente' => 'required',
            'turista_estrangeiro' => 'required'
        ]);

        // Faça algo com os dados, como salvar no banco de dados
        // Model::create($validatedData);

        return response()->json(['success' => 'Formulário enviado com sucesso!']);
    }
}
