<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TelaHomeController;
Route::get('/search', [SearchController::class, 'index'])->name('search.results');

Route::get('/', [TelaHomeController::class, "index"])->name("main");

Route::get('/dashboard', [ProfileController::class,"Dashboard"])
->middleware(['auth', 'verified'])->name('dashboard');

// configuração 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// End configuração 


require __DIR__."/despesa.php";
require __DIR__."/processoslicitatorios.php";
require __DIR__."/naturezareitaroute.php";
require __DIR__."/receita.php";
require __DIR__."/receitasdespesasextraorcamentaria.php";
require __DIR__."/MovimentacaoBancariaroute.php";
require __DIR__."/PagamentosReceitasDespesasExtraorcamentariaRoute.php";
require __DIR__."/cargosroute.php";
require __DIR__."/tipopoderRoute.php";
require __DIR__."/entidaderoute.php";
require __DIR__."/unidaderoute.php";
require __DIR__."/tipoempenhoroute.php";
require __DIR__."/categoriaEmpenhoRoute.php";
require __DIR__."/tipoacaoroute.php";
require __DIR__."/tipoRecursoroute.php";
require __DIR__."/nomeorgaoroute.php";
require __DIR__."/naturezajuridicaroute.php";
require __DIR__."/nomecredorroute.php";
require __DIR__."/finalidaderoute.php";
require __DIR__."/formaingresso.php";
require __DIR__."/classificacaoroutes.php";
require __DIR__."/fonterecursoroute.php";
require __DIR__."/tipocontaroute.php";
require __DIR__."/situacaodocargoroute.php";
require __DIR__."/classificacaoCargoroute.php";
require __DIR__."/servidoresRoute.php";
require __DIR__."/vinculoEmpregaticioRoute.php";
require __DIR__."/classificacaoAfastamentoroute.php";
require __DIR__."/lotacaoroute.php";
require __DIR__."/tipoContratoRoute.php";
require __DIR__."/ModalidadeLicitacaoRoute.php";
require __DIR__."/ContratoRoute.php";
require __DIR__."/ContratoItemRoute.php";
require __DIR__."/FormaJulgamentoRoute.php";
require __DIR__."/relatorioRoutes.php";
require __DIR__."/comprasDiretasRoutes.php";
require __DIR__.'/auth.php';
