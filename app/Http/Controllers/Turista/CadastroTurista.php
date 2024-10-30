<?php

namespace App\Http\Controllers\Turista;

use App\Http\Controllers\Controller;
use App\Http\Requests\TuristaRequest;
use App\Models\Configuracoes\Cobrancas;
use App\Models\Lancamento\LancamentoCobranca;
use App\Models\Turista\Turista;
use App\Services\CobrancaService;
use Carbon\Carbon;
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
            $turista = $this->createTurista($validatedData);
            $cobrancaResponse = $this->gerarCobranca($validatedData, $turista->id_turista);
            $lancamentoCobranca = $this->createLancamentoCobranca($validatedData, $cobrancaResponse, $turista->id_turista);


            return $this->successResponse([
                'success' => 'Cobrança gerada com sucesso!',
                'cobranca' => data_get($cobrancaResponse, 'cobranca', ''),
                'qr_code' => base64_encode(data_get($cobrancaResponse, 'qr_code', '')),
                'pix_emv' => data_get($cobrancaResponse, 'detalhes_cobranca.dados.pix_emv', ''),
                'id_cobranca' => $lancamentoCobranca->id_cobranca
            ]);

        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function checkPaymentStatus(Request $request): JsonResponse
    {
        $idCobranca = $request->input('id_cobranca');
        $detalhesCobranca = $this->cobrancaService->consultarDetalhesCobranca($idCobranca);
        $detalhesCobranca['dados']['situacao'] = 'pago';
        if (data_get($detalhesCobranca, 'dados.situacao') === 'pago') {
            return response()->json(['paid' => true]);
        }

        return response()->json(['paid' => false]);
    }

    protected function createTurista(array $data)
    {
        return Turista::create($data);
    }

    protected function gerarCobranca(array $data, int $idTurista)
    {
        $data['id_turista'] = $idTurista;
        return $this->cobrancaService->gerarCobranca($data);
    }

    protected function createLancamentoCobranca(array $validatedData, array $cobrancaResponse, int $idTurista)
    {
        $cobranca = Cobrancas::where('cobranca_ativa', true)->latest()->first() ?? Cobrancas::latest()->first();

        $data = [
            'id_cobranca' => $cobranca ? $cobranca->id_cobranca : null,
            'id_turista' => $idTurista,
            'id_cobranca_bb' => data_get($cobrancaResponse, 'cobranca.0.dados.id', ''),
            'lancamento_valor' => $validatedData['valor_taxa'] ?? 0,
            'lancamento_data_gerado' => now(),
            'lancamento_codigo_barras' => data_get($cobrancaResponse, 'detalhes_cobranca.dados.codigo_barras', ''),
            'lancamento_codigo_pix' => data_get($cobrancaResponse, 'detalhes_cobranca.dados.pix_emv', ''),
            'lancamento_pago' => false,
            'lancamento_ativo' => true,
            'data_inicio' => Carbon::createFromFormat('Y-m-d', $validatedData['data_inicial']),
            'data_fim' => Carbon::createFromFormat('Y-m-d', $validatedData['data_final'])
        ];

        return LancamentoCobranca::create($data);
    }

    private function successResponse(array $data): JsonResponse
    {
        return response()->json($data);
    }

    private function errorResponse(string $message, int $status = 500): JsonResponse
    {
        return response()->json(['error' => $message], $status);
    }
}
