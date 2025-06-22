<?php
use App\Http\Controllers\PagamentosReceitasDespesasExtraorcamentariaController;
use Illuminate\Support\Facades\Route;

Route::get("pagamentos/receita/despesas/extrar/orcamentaria", 
[PagamentosReceitasDespesasExtraorcamentariaController::class, 'index'])
->middleware(['auth', 'verified'])->name('pagamentosdespesasreceita');

Route::get("/pagamentos/receita/{id}/depesas/extra/orcamentaria", 
[PagamentosReceitasDespesasExtraorcamentariaController::class, "show"])
->middleware(['auth', 'verified'])->name('pagamentosdespesasreceita.show');

Route::get("/pagamento/receita/depesas/{id}/extra/orcamentaria",
[PagamentosReceitasDespesasExtraorcamentariaController::class,"edit"])
->middleware(['auth', 'verified'])->name('pagamentosdespesasreceita.edit');

Route::put("/pagamentos/receita/{id}/despesas/extra/orcamentaria",
[PagamentosReceitasDespesasExtraorcamentariaController::class, "update"])
->middleware(['auth', 'verified'])->name('pagamentosdespesasreceita.update'); 

Route::get('/pagamentos/receita/despesas/extra/orcamentaria/create',[PagamentosReceitasDespesasExtraorcamentariaController::class,'create'])
->middleware(['auth', 'verified'])->name('pagamentosdespesasreceita.create'); 

Route::post("/pagamentos/receita/despesas/extra/orcamentaria",
[PagamentosReceitasDespesasExtraorcamentariaController::class, "store"])
->middleware(['auth', 'verified'])->name('pagamentosdespesasreceita.store');

Route::delete("/pagamentos/receita//depesas/extra/orcamentaria/{id}",
    [PagamentosReceitasDespesasExtraorcamentariaController::class, "destroy"])
    ->middleware(['auth', 'verified'])
    ->name('pagamentosdespesasreceita.destroy');