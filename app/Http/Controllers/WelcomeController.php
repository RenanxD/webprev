<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $estados = Estado::all(); // Não precisa carregar as cidades aqui
        return view('welcome', compact('estados'));
    }
}
