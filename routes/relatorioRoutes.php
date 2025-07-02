<?php
use App\Http\Controllers\RelatoriosController;
use Illuminate\Support\Facades\Route;


Route::get("/publico/relatorio",[RelatoriosController::class,"index"])
->name('publico.relatorio');

//Categorias 

// 1. Movimentação Bancária
Route::get("/publico/relatorio/movimentacao-bancaria", [RelatoriosController::class, "movimentacaoBancaria"])
    ->name('publico.relatorio.movimentacao_bancaria');

// 2. Movimentação Bancária Mensal
Route::get("/publico/relatorio/movimentacao-bancaria-mensal", [RelatoriosController::class, "movimentacaoBancariaMensal"])
    ->name('publico.relatorio.movimentacao_bancaria_mensal');

// 3. Relatório da Lei de Responsabilidade Fiscal
Route::get("/publico/relatorio/lei-responsabilidade-fiscal", [RelatoriosController::class, "leiResponsabilidadeFiscal"])
    ->name('publico.relatorio.lei_responsabilidade_fiscal');