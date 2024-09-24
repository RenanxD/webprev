<?php

use App\Http\Controllers\CidadeController;
use App\Http\Controllers\Configuracoes\CobrancasController;
use App\Http\Controllers\Configuracoes\TipoCobrancaController;
use App\Http\Controllers\ConfiguracoesController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Models\Estado;
use Illuminate\Support\Facades\Route;

Route::resource('/', WelcomeController::class);

Route::get('/api/estados/{id}/cidades', [EstadoController::class, 'getCidades']);
Route::get('{slug}/signin', [CidadeController::class, 'signin'])->name('login');
Route::post('{slug}/signin', [CidadeController::class, 'sendLoginCode']);
Route::get('/verify-code', [CidadeController::class, 'showVerifyCodeForm'])->name('verify-code');
Route::post('/verify-code', [CidadeController::class, 'verifyCode']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/cobrancas', CobrancasController::class);
    Route::resource('/tipocobranca', TipoCobrancaController::class);
    Route::resource('/configuracoes', ConfiguracoesController::class);
});

require __DIR__.'/auth.php';
