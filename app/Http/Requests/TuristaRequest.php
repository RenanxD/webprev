<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class TuristaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
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
            'turista_estrangeiro' => 'required|boolean',
            'data_inicial' => 'required',
            'data_final' => 'required',
            'valor_taxa' => 'required'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'turista_dependente' => $this->turista_dependente === 'sim',
            'turista_estrangeiro' => $this->turista_estrangeiro === 'sim',
            'turista_necessidade_esp' => false
        ]);
    }
}
