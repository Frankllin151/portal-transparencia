<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
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
       $user = $request->user();
        $userData = $request->validated();

        // **Lógica para o upload e salvamento da foto**
        if ($request->hasFile('foto')) {
            // Salva a imagem no disco 'public'
            $path = $request->file('foto')->store('fotos_usuarios', 'public');
            // Obtém o URL completo e o atribui para ser salvo no DB
            $userData['foto'] = Storage::url($path);
        } else {
            // Se não houver novo upload, e você quer explicitamente setar como null se não for enviado, use isso.
            // Caso contrário, remova esta linha para manter a foto existente se não for atualizada.
            // $userData['foto'] = null;
        }

        $user->fill($userData);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

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
