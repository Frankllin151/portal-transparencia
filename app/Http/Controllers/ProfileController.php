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
use Illuminate\Support\Facades\File;

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

       if ($request->hasFile('foto')) {
    $foto = $request->file('foto');

    // Gerar um nome de arquivo único para a foto
    $nomeArquivo = uniqid() . '_' . time() . '.' . $foto->getClientOriginalExtension();

    // Definir o caminho completo para a subpasta dentro de 'public'
    $caminhoDestino = public_path('fotos_usuarios');

    // Criar a pasta 'fotos_usuarios' dentro de 'public' se ela não existir
    if (!File::isDirectory($caminhoDestino)) {
        File::makeDirectory($caminhoDestino, 0755, true, true);
    }

    // Mover o arquivo de upload para o diretório de destino
    $foto->move($caminhoDestino, $nomeArquivo);

    // Salvar o caminho **relativo** no banco de dados
    // Ex: 'fotos_usuarios/nome_da_foto.jpg'
    $userData['foto'] = 'fotos_usuarios/' . $nomeArquivo;
} else {
    // Se não houver novo upload, a foto deve ser definida como null no banco de dados.
    // Se a intenção for manter a foto existente caso nenhuma nova seja enviada,
    // você precisaria de uma lógica diferente aqui (por exemplo, não sobrescrever $userData['foto']
    // se já houver uma foto e nenhum novo upload).
    $userData['foto'] = null;
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
