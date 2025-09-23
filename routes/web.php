
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlimentoController;
use App\Http\Controllers\ReceitaController;

Route::get('/', function () {
    return redirect()->route('alimentos.index');
});

Route::resource('alimentos', AlimentoController::class);

// Rotas para receitas
Route::get('receitas/gerar', [ReceitaController::class, 'gerarForm'])->name('receitas.gerarForm');
Route::post('receitas/gerar', [ReceitaController::class, 'gerar'])->name('receitas.gerar');

Route::get('receitas', [ReceitaController::class, 'index'])->name('receitas.index');
Route::post('receitas', [ReceitaController::class, 'store'])->name('receitas.store');
Route::delete('receitas/{receita}', [ReceitaController::class, 'destroy'])->name('receitas.destroy');
