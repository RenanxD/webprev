<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function getCidades($id)
    {
        $estado = Estado::with('cidades')->find($id);

        if ($estado) {
            return response()->json($estado->cidades);
        }
        return response()->json([]);
    }
}
