<?php

use App\Http\Controllers\Configuracoes\CobrancasController;
use App\Http\Controllers\Configuracoes\TipoCobrancaController;
use App\Http\Controllers\ConfiguracoesController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Turista\AcessarComprovante;
use App\Http\Controllers\Turista\AuthController;
use App\Http\Controllers\Turista\CadastroTurista;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::resource('/', WelcomeController::class);

Route::get('/api/estados/{id}/cidades', [EstadoController::class, 'getCidades']);

Route::get('{slug}/signin/{token?}', [AuthController::class, 'signin'])->name('login.signin');
Route::post('{slug}/signin-link', [AuthController::class, 'sendLoginLink']);

Route::get('/{slug}/complete-registration', [AuthController::class, 'showCompleteRegistrationForm'])
    ->name('complete.registration');

Route::get('/{slug}/acessar-comprovante', [AcessarComprovante::class, 'acessarComprovante'])->name('acessar.comprovante');

Route::post('/salvar-dependente', [CadastroTurista::class, 'salvarDependente'])->name('salvar.dependente');
Route::post('/submit-form', [CadastroTurista::class, 'submit'])->name('form.submit');

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

Route::get('/{slug}/api/check-payment-status', [CadastroTurista::class, 'checkPaymentStatus']);

Route::get('/{slug}/comprovante/download/{idCobranca}', [CadastroTurista::class, 'gerarComprovantePdf'])->name('comprovante.download');

require __DIR__.'/auth.php';
