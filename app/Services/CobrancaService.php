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
        $cpf = str_replace(['.', '-'], '', $turista->turista_cpf);

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
                "pagador_cpf_cnpj" => $cpf, // CPF sem os caracteres especiais
                "pagador_nome" => $turista->turista_nome,
            ]
        ];

        try {
            // Utiliza o método getHeaders() para passar os headers
            $response = Http::withHeaders($this->getHeaders())->post('https://cobranca.kapitolbank.com.br/api/cob/', $cobrancaData);

            if ($response->successful()) {
                $cobranca = $response->json();
                $idCobranca = $cobranca[0]['dados']['id'];

                $detalhesCobranca = $this->consultarDetalhesCobranca($idCobranca);

                //$detalhesCobranca = [
                //    "dados" => [
                //        "beneficiario" => [
                //            "bairro" => "RIBEIRAO AREIA",
                //            "cep" => "89107000",
                //            "cidade" => "POMERODE",
                //            "cpf_cnpj" => "17653665000105",
                //            "endereco" => "R AUGUSTO BERNARDO HERMANN GEISLER, 82",
                //            "nome" => "Fabio Jonas Zech ME",
                //            "razao_social" => "Fabio Jonas Zech ME",
                //            "uf" => "SC"
                //        ],
                //        "pix_informacoes_adicionais" => [],
                //        "pagador_uf" => null,
                //        "valor_original" => 3.0,
                //        "dias_limite_recebimento" => 3,
                //        "data_vencimento" => "2024-10-20",
                //        "data_emissao" => "2024-10-18",
                //        "pagador_cpf_cnpj" => "10128995947",
                //        "mensagem" => "Não receber após 12/06/2024",
                //        "pix_emv" => "00020101021226900014br.gov.bcb.pix2568qrcodepix.bb.com.br/pix/v2/cobv/e6ca093a-b633-4f73-b7ff-b4bd3a6b5f9752040000530398654043.005802BR5925IPAM - INST. DE PREVIDENC6006ITAJAI62070503***6304B7C6",
                //        "num_titulo_cliente" => 2000000035,
                //        "aceite" => "N",
                //        "id" => "819c56eb-72bb-49a5-be7f-51963d29edb1",
                //        "data_pagamento" => null,
                //        "situacao" => "aceita 1",
                //        "dias_negativacao" => 0,
                //        "tags" => "guia-previdenciaria",
                //        "tipo_cobranca" => "boleto-hibrido",
                //        "linha_digitavel" => "00190000090363384320000000035170198750000000300",
                //        "pagador_cep" => null,
                //        "especie_doc" => "DM",
                //        "valor_multa" => 0.0,
                //        "pagador_endereco" => null,
                //        "pagador_bairro" => null,
                //        "pagador_id" => "655",
                //        "dias_protesto" => 0,
                //        "codigo_barras" => "00191987500000003000000003633843200000003517",
                //        "valor_abatimento" => 0.0,
                //        "campo_uso_beneficiario" => null,
                //        "valor_pago" => 0.0,
                //        "num_titulo_beneficiario" => "50366237000169",
                //        "valor_juros" => 0.0,
                //        "pagador_nome" => "RENAN DE PAULA DA SILVA",
                //        "pix_txid" => "BOLETO36338432000000035DATA18102024",
                //        "dt_emissao" => "2024-10-18T14:14:17",
                //        "pagar_vencido" => false,
                //        "nosso_numero" => "00036338432000000035",
                //        "pix_solicitacao_pagador" => null,
                //        "pix_url" => "qrcodepix.bb.com.br/pix/v2/cobv/e6ca093a-b633-4f73-b7ff-b4bd3a6b5f97",
                //        "pagador_cidade" => null,
                //        "pagador_fone" => null
                //    ],
                //    "erros" => []
                //];

                //$qrCode = $this->consultarQrCode($idCobranca);

                $qrCode = file_get_contents(public_path('images/qrcode.png'));

                return [
                    'cobranca' => $cobrancaData,
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
            $response = Http::withHeaders($this->getHeaders())->get("https://cobranca.kapitolbank.com.br/public/barcode/{$id}");
            return $response->successful() ? $response->json() : null;
        } catch (\Exception $e) {
            return null;
        }
    }

    private function consultarQrCode($id)
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

    private function consultarDetalhesCobranca($id)
    {
        try {
            $response = Http::withHeaders($this->getHeaders())->get("https://cobranca.kapitolbank.com.br/api/cob/{$id}");
            return $response->successful() ? $response->json() : null;
        } catch (\Exception $e) {
            return null;
        }
    }
}
