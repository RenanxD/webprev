<?php

namespace App\Http\Controllers\Turista;

use App\Http\Controllers\Controller;
use App\Http\Requests\TuristaRequest;
use App\Models\Turista\Turista;
use App\Services\CobrancaService;
use Illuminate\Support\Facades\Log;
use Exception;

class CadastroTurista extends Controller
{
    protected $cobrancaService;

    public function __construct(CobrancaService $cobrancaService)
    {
        $this->cobrancaService = $cobrancaService;
    }

    public function submit(TuristaRequest $request)
    {
        $validatedData = $request->validated();

        try {
            $turista = Turista::create($validatedData);

            $validatedData['id_turista'] = $turista->id;

            $cobrancaResponse = $this->cobrancaService->gerarCobranca($validatedData);

            Log::info('Cobranca Response:', $cobrancaResponse);

            if (!isset($cobrancaResponse['qr_code'])) {
                return response()->json(['error' => 'QR Code não encontrado'], 500);
            }

            if (isset($cobrancaResponse['error'])) {
                return response()->json(['error' => $cobrancaResponse['error']], 500);
            }

            $qrCodeBase64 = base64_encode($cobrancaResponse['qr_code']);

            return response()->json([
                'success' => 'Formulário enviado e cobrança gerada com sucesso!',
                'cobranca' => $cobrancaResponse['cobranca'],
                'qr_code' => $qrCodeBase64,
                'pix_emv' => $cobrancaResponse['detalhes_cobranca']['dados']['pix_emv'],
            ]);

        } catch (Exception $e) {
            Log::error('Erro ao gerar a cobrança: ' . $e->getMessage());

            return response()->json([
                'error' => 'Ocorreu um erro ao gerar a cobrança. Tente novamente mais tarde.'
            ], 500);
        }
    }
}
