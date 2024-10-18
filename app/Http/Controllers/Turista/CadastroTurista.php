<?php

namespace App\Http\Controllers\Turista;

use App\Http\Controllers\Controller;
use App\Models\Turista\Turista;
use App\Services\CobrancaService;
use Illuminate\Http\Request;

class CadastroTurista extends Controller
{
    protected $cobrancaService;

    public function __construct(CobrancaService $cobrancaService)
    {
        $this->cobrancaService = $cobrancaService;
    }

    public function submit(Request $request)
    {
        $request->merge([
            'turista_dependente' => $request->turista_dependente === 'sim',
            'turista_estrangeiro' => $request->turista_estrangeiro === 'sim',
            'turista_necessidade_esp' => false
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

        $turista = Turista::create($validatedData);

        $cobrancaResponse = $this->cobrancaService->gerarCobranca($turista);

        if (isset($cobrancaResponse['error'])) {
            return response()->json(['error' => $cobrancaResponse['error']], 500);
        }

        // Codifica o QR code binário para base64
        $qrCodeBase64 = base64_encode($cobrancaResponse['qr_code']);

        return response()->json([
            'success' => 'Formulário enviado e cobrança gerada com sucesso!',
            'cobranca' => $cobrancaResponse['cobranca'],
            'qr_code' => $qrCodeBase64,
            'pix_emv' => $cobrancaResponse['detalhes_cobranca']['dados']['pix_emv'],
        ]);
    }
}
