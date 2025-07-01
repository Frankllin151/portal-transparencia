<?php

use App\Http\Controllers\ProfileController;
use  App\Http\Controllers\TelaHomeController;
use App\Http\Controllers\PublicaReceitaController;
use Illuminate\Support\Facades\Route;

// Tela Publicas
Route::get('/', [TelaHomeController::class, "index"])->name("main");
Route::get("/publica/receitas", [PublicaReceitaController::class,"index"])
->name("receitapublica");
Route::get("/publica/receitas/prevista/x/realizada", [PublicaReceitaController::class, 
"previstaRealizada"])
->name('receita.prevista.x.realizada');
Route::get("/publica/receita/orcamentaria", [PublicaReceitaController::class, 
"ReceitaOrcamentaria"])->name("receita.orcamentaria");
Route::get("/publica/receitas/orcamentaria/diaria", [PublicaReceitaController::class,
"VisualizaDiariaOrcamentaria"])->name("receita.orcamentaria.diaria");
// Tela Publicas end


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
require __DIR__.'/auth.php';
