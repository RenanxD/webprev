<?php

namespace App\Http\Controllers\Turista;

use App\Http\Controllers\Controller;
use App\Http\Requests\TuristaRequest;
use App\Models\Turista\Turista;
use App\Services\CobrancaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

class CadastroTurista extends Controller
{
    protected $cobrancaService;

    public function __construct(CobrancaService $cobrancaService)
    {
        $this->cobrancaService = $cobrancaService;
    }

    public function submit(TuristaRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        try {
            $turista = Turista::create($validatedData);
            $validatedData['id_turista'] = $turista->id_turista;

            $cobrancaResponse = $this->cobrancaService->gerarCobranca($validatedData);

            $qrCodeBase64 = base64_encode($cobrancaResponse['qr_code']);
            $idCobranca = $cobrancaResponse['cobranca'][0]['dados']['id'] ?? '';
            $cobranca = $cobrancaResponse['cobranca'] ?? '';
            $pixEmv = $cobrancaResponse['detalhes_cobranca']['dados']['pix_emv'] ?? '';

            return response()->json([
                'success' => 'Cobrança gerada com sucesso!',
                'cobranca' => $cobranca,
                'qr_code' => $qrCodeBase64,
                'pix_emv' => $pixEmv,
                'id_cobranca' => $idCobranca
            ]);

        } catch (Exception $e) {
            return response()->json([
                'exception' => $e->getMessage(),
            ], 500);
        }
    }

    public function checkPaymentStatus(Request $request)
    {
        $idCobranca = $request->input('id_cobranca');

        $detalhesCobranca = $this->cobrancaService->consultarDetalhesCobranca($idCobranca);

        //$detalhesCobranca['dados']['situacao'] = 'pago';

        if ($detalhesCobranca['dados']['situacao'] === 'pago') {
            return response()->json(['paid' => true]);
        }

        return response()->json(['paid' => false]);
    }
}
