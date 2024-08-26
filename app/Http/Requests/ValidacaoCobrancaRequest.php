<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacaoCobrancaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_tipo_cobranca',
            'cobranca_descricao' => 'required|string|min:3|max:255',
            'cobranca_perm_minima' => 'required|numeric',
            'cobranca_vlr_adicional' => 'required|numeric',
            'cobranca_perm_dia_adicional' => 'required|numeric',
            'cobranca_ativa' => 'required|boolean'
        ];
    }
}
