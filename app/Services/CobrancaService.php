<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class CobrancaService
{
    // Método que retorna os headers
    private function getHeaders()
    {
        return [
            'x-api-key' => 'b9b5caa6-63f4-41a2-9f3b-4b3212c36eb7',
            'Content-Type' => 'application/json',
        ];
    }

    public function gerarCobranca($turista)
    {
        $dataGeracao = Carbon::now();
        $dataVencimento = $dataGeracao->copy()->addDays(3);

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
                "pagador_id" => strval($turista->id_turista),
                "pagador_cpf_cnpj" => $turista->turista_cpf,
                "pagador_nome" => $turista->turista_nome,
            ]
        ];

        try {
            // Utiliza o método getHeaders() para passar os headers
            $response = Http::withHeaders($this->getHeaders())->post('https://cobranca.kapitolbank.com.br/api/cob/', $cobrancaData);

            if ($response->successful()) {
                $cobranca = $response->json();
                $idCobranca = $cobranca[0]['dados']['id'];

                $barCode = $this->consultarBarCode($idCobranca);
                $qrCode = $this->consultarQrCode($idCobranca);
                $detalhesCobranca = $this->consultarDetalhesCobranca($idCobranca);

                return [
                    'cobranca' => $cobranca,
                    'bar_code' => $barCode,
                    'qr_code' => $qrCode,
                    'detalhes_cobranca' => $detalhesCobranca,
                ];
            }

            return ['error' => 'Erro ao gerar a cobrança: ' . $response->body()];

        } catch (\Exception $e) {
            return ['error' => 'Erro ao gerar a cobrança: ' . $e->getMessage()];
        }
    }

    private function consultarBarCode($id)
    {
        try {
            // Utiliza o método getHeaders() para passar os headers
            $response = Http::withHeaders($this->getHeaders())->get("https://cobranca.kapitolbank.com.br/public/barcode/{$id}");
            return $response->successful() ? $response->json() : null;
        } catch (\Exception $e) {
            return null;
        }
    }

    private function consultarQrCode($id)
    {
        try {
            // Utiliza o método getHeaders() para passar os headers
            $response = Http::withHeaders($this->getHeaders())->get("https://cobranca.kapitolbank.com.br/public/qrcode/{$id}");
            return $response->successful() ? $response->json() : null;
        } catch (\Exception $e) {
            return null;
        }
    }

    private function consultarDetalhesCobranca($id)
    {
        try {
            // Utiliza o método getHeaders() para passar os headers
            $response = Http::withHeaders($this->getHeaders())->get("https://cobranca.kapitolbank.com.br/api/cob/{$id}");
            return $response->successful() ? $response->json() : null;
        } catch (\Exception $e) {
            return null;
        }
    }
}