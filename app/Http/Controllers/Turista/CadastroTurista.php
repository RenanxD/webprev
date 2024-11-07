<?php

namespace App\Http\Controllers\Turista;

use App\Http\Controllers\Controller;
use App\Http\Requests\TuristaRequest;
use App\Models\Cidade;
use App\Models\Comprovante\ComprovanteTaxa;
use App\Models\Configuracoes\Cobrancas;
use App\Models\Lancamento\LancamentoCobranca;
use App\Models\Turista\Turista;
use App\Services\CobrancaService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Session;

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

            $idCobrancaBB = data_get($cobrancaResponse, 'cobranca.0.dados.id', '');
            session(['id_cobranca_bb' => $idCobrancaBB]);

            return $this->successResponse([
                'success' => 'Cobrança gerada com sucesso!',
                'cobranca' => data_get($cobrancaResponse, 'cobranca', ''),
                'qr_code' => base64_encode(data_get($cobrancaResponse, 'qr_code', '')),
                'pix_emv' => data_get($cobrancaResponse, 'detalhes_cobranca.dados.pix_emv', ''),
                'id_cobranca_bb' => $idCobrancaBB,
            ]);

        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function checkPaymentStatus(Request $request, $slug): JsonResponse
    {
        $slugCidade = Cidade::where('slug', $slug)->first();
        $idCobrancaBB = session('id_cobranca_bb');
        $detalhesCobranca = $this->cobrancaService->consultarDetalhesCobranca($idCobrancaBB);
        $detalhesCobranca['dados']['situacao'] = 'pago';

        $cobranca = LancamentoCobranca::where('id_cobranca_bb', $idCobrancaBB)->first();

        if (data_get($detalhesCobranca, 'dados.situacao') === 'pago') {
            $data = [
                'id_lancamento' => $cobranca->id_lancamento,
                'id_turista' => $cobranca->id_turista,
                'id_cidade' => $slugCidade->getAttributes()['id_cidade'],
                'comprovante_hash' => '',
                'comprovante_numero' => '',
                'comprovante_data_inicio' => $cobranca->data_inicio,
                'comprovante_data_fim' => $cobranca->data_fim,
                'comprovante_data_emissao' => $cobranca->created_at,
        ];
            ComprovanteTaxa::create($data);

            return response()->json(['paid' => true]);
        }

        return response()->json(['paid' => false]);
    }

    public function salvarDependente(Request $request)
    {
        $dependente = $request->only(['nome', 'data_nascimento', 'parentesco']);

        $dependentes = Session::get('dependentes', []);
        $dependentes[] = $dependente;
        Session::put('dependentes', $dependentes);

        return response()->json(['success' => true]);
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

    public function gerarComprovantePdf($slug, $idCobranca)
    {
        $comprovante = LancamentoCobranca::where('id_cobranca_bb', $idCobranca)->firstOrFail();
        $turista = Turista::where('id_turista', $comprovante->id_turista)->first();
        $slugCidade = Cidade::where('slug', $slug)->first();

        $imageData = $this->cobrancaService->consultarQrCode($comprovante->id_cobranca_bb);
        $type = 'png';
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($imageData);

        $dataInicio = Carbon::parse($comprovante->data_inicio);
        $dataFim = Carbon::parse($comprovante->data_fim);
        $permanencia = (int) $dataInicio->diffInDays($dataFim) + 1;

        $dados = [
            'nome' => $turista->turista_nome,
            'regiao' => strtoupper($slugCidade->cidade_descricao),
            'data_inicio' => $dataInicio->format('d/m/Y'),
            'data_fim' => $dataFim->format('d/m/Y'),
            'data_emissao' => Carbon::parse($comprovante->created_at)->format('d/m/Y \à\s H:i:s'),
            'permanencia' => $permanencia,
            'valor' => number_format($comprovante->lancamento_valor, 2, ',', '.'),
            'qr_code' => $base64
        ];

        $pdf = Pdf::loadView('pdf.comprovante', $dados);

        return $pdf->stream("comprovante_{$idCobranca}.pdf");
    }
}
