<?php

namespace App\Http\Controllers\Turista;

class AcessarComprovante
{
    public function acessarComprovante($slug)
    {
        $email = session('email'); // Pega o e-mail da sessão

        return view('turista.acessar-comprovante', compact('email', 'slug'));
    }
}
