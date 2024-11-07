<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class CobrancaService
{
    const BASE_URL = 'https://cobranca.kapitolbank.com.br/api/cob/';

    private function getHeaders(): array
    {
        return [
            'x-api-key' => 'b9b5caa6-63f4-41a2-9f3b-4b3212c36eb7',
            'Content-Type' => 'application/json',
        ];
    }

    public function gerarCobranca(array $turista): array
    {
        if (empty($turista['turista_cpf']) || empty($turista['id_turista']) || empty($turista['turista_nome'])) {
            return ['error' => 'Dados do turista inválidos.'];
        }

        $dataGeracao = Carbon::now();
        $dataVencimento = $dataGeracao->copy()->addDays(3);
        $cpf = str_replace(['.', '-'], '', $turista['turista_cpf']);

        $cobrancaData = [
            [
                "tipo_cobranca" => "boleto-hibrido",
                "data_vencimento" => $dataVencimento->format('Y-m-d'),
                "valor_original" => "3",
                "valor_abatimento" => 0,
                "multa_tipo" => 0,
                "multa_data" => null,
                "multa_valor" => 0,
                "juros_tipo" => 0,
                "juros_valor" => 0,
                "desconto_1_tipo" => 0,
                "desconto_1_data" => null,
                "desconto_1_valor" => 0,
                "dias_limite_recebimento" => 3,
                "pagar_vencido" => false,
                "dias_protesto" => 0,
                "dias_negativacao" => 0,
                "num_titulo_beneficiario" => "1693859156",
                "campo_uso_beneficiario" => null,
                "mensagem" => "Não receber após 12/06/2024",
                "tags" => "guia-previdenciaria",
                "pagador_id" => strval($turista['id_turista']),
                "pagador_cpf_cnpj" => $cpf,
                "pagador_nome" => $turista['turista_nome'],
            ]
        ];

        try {
            $response = Http::withHeaders($this->getHeaders())->post(self::BASE_URL, $cobrancaData);
            if ($response->successful()) {
                $cobranca = $response->json();
                $idCobranca = $cobranca[0]['dados']['id'] ?? null;

                sleep(5);

                $detalhesCobranca = $this->consultarDetalhesCobranca($idCobranca);
                $qrCode = $this->consultarQrCode($idCobranca);

                return [
                    'cobranca' => $cobranca,
                    'qr_code' => $qrCode,
                    'detalhes_cobranca' => $detalhesCobranca,
                ];
            }

            return ['error' => 'Erro ao gerar a cobrança: ' . $response->body()];

        } catch (\Exception $e) {
            return ['error' => 'Erro ao gerar a cobrança: ' . $e->getMessage()];
        }
    }

    public function consultarQrCode($id)
    {
        try {
            $response = Http::withHeaders($this->getHeaders())->get("https://cobranca.kapitolbank.com.br/public/qrcode/{$id}");

            if ($response->successful()) {
                return $response->body();
            }

            return null;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function consultarDetalhesCobranca($id)
    {
        try {
            $response = Http::withHeaders($this->getHeaders())->get("https://cobranca.kapitolbank.com.br/api/cob/{$id}");
            return $response->successful() ? $response->json() : null;
        } catch (\Exception $e) {
            return null;
        }
    }
}
