<?php

namespace App\Http\Controllers\Turista;

class AcessarComprovante
{
    public function acessarComprovante($slug)
    {
        $email = session('email');

        return view('turista.acessar-comprovante', compact('email', 'slug'));
    }
}
