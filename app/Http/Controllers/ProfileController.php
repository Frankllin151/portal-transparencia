<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\Pagamentosreceitasdespesasextraorcamentarium;
use App\Models\Despesa;
use App\Models\Receitum;
use App\Models\Processoslicitatorio;
use App\Models\Movimentacaobancarium;
use App\Models\Servidore;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    public function Dashboard()
    {
    
    $pagamentoValor = Pagamentosreceitasdespesasextraorcamentarium::sum("valor");
    $ValorDepesasaPaga = Despesa::sum("valor_pago");
    $Receita = Receitum::sum("valor_orcado_inicial");
    $processo = Processoslicitatorio::count();
    $totalRemuneracaoContratualRegistro = Servidore::count();
    
       return view('dashboard', ["pagamentoValor" => $pagamentoValor,
    "valorPagoDepesaPaga" => $ValorDepesasaPaga, 
    "processo" => $processo, 
    "Receita" => $Receita, 
    'totalRemuneracaoContratualRegistro' =>  $totalRemuneracaoContratualRegistro, 
    ]);
    }

}
