<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'exibirContato'])->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'autenticar'])->name('site.login');

Route::middleware(['autenticacao:padrao'])->prefix('/app')->group(function() {
    Route::get('/clientes', function() { return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedores', function() { return 'Fornecedores'; })->name('app.fornecedores');
    Route::get('/produtos', function() { return 'Produtos'; })->name('app.produtos');
});

