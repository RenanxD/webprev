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
            'nome' => 'required',
            'email' => 'required|email',
            'endereco' => 'required',
            'cidade' => 'required',
        ]);

        // Faça algo com os dados, como salvar no banco de dados
        // Model::create($validatedData);

        return response()->json(['success' => 'Formulário enviado com sucesso!']);
    }
}
