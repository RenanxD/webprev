<?php

namespace App\Http\Controllers\Turista;

use App\Models\Cidade;
use App\Models\Comprovante\ComprovanteTaxa;
use App\Models\Turista\Turista;

class AcessarComprovante
{
    public function acessarComprovante($slug)
    {
        $email = session('email');
        $comprovantes = collect();
        $turista = Turista::where('turista_email', $email)->first();
        $cidade = Cidade::where('slug', $slug)->first();

        if ($turista) {
            $comprovantes = ComprovanteTaxa::where('id_turista', $turista->id_turista)->get();
        }

        return view('turista.acessar-comprovante', compact('email', 'cidade', 'comprovantes'));
    }
}
