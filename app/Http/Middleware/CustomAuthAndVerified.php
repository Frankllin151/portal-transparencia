<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route; // Importar a fachada Route
use App\Models\GroupUser; // Importar seu modelo GroupUser
use App\Models\Permission; // Importar seu modelo Permission

class CustomAuthAndVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
   public function handle(Request $request, Closure $next)
    {
         // 1. Verificar se o usuário está logado
        if (!Auth::check()) {
            return redirect('/login'); // Ou qualquer rota de login que você use
        }

        $user = Auth::user();

        // 2. Obter o nome da rota atual
        $currentRouteName = Route::currentRouteName();

        // **Importante**: Se sua rota não tiver um nome, esta parte não funcionará.
        // Certifique-se de nomear todas as rotas que precisam de permissão.
        if (is_null($currentRouteName)) {
            return $next($request);
        }

        // Rotas que não precisam de verificação de permissão (ex: dashboard, home, logout)
        $publicRoutes = ['dashboard', 'home', 'logout', 'profile.edit', "profile.update", "profile.destroy"];
        if (in_array($currentRouteName, $publicRoutes)) {
            return $next($request);
        }

        // 3. Obter as permissões do usuário através de seus grupos
        $userPermissions = collect();
        $userGroups = GroupUser::where('user_id', $user->id)
                                ->with('group.permissions')
                                ->get();

        foreach ($userGroups as $groupUser) {
            foreach ($groupUser->group->permissions as $permission) {
                // *** AQUI É A MUDANÇA PRINCIPAL ***
                // Divide a string de permissões por vírgula e adiciona ao collection
                $keys = explode(',', $permission->key);
                foreach ($keys as $key) {
                    $userPermissions->push(trim($key)); // trim() para remover espaços em branco
                }
            }
        }
        $userPermissions = $userPermissions->unique()->values()->toArray(); // Pega apenas as chaves únicas

        // dd($userPermissions); // Para depuração, agora deve mostrar ["servidores", "processo", "contratos", "contratos_item"]

        // 4. Verificar se o usuário possui a permissão 'todas'
        if (in_array('todas', $userPermissions)) {
            return $next($request); // Se tiver 'todas', permite acesso a qualquer rota.
        }

        // 5. Verificar se o nome da rota atual está entre as permissões do usuário
        if (!in_array($currentRouteName, $userPermissions)) {
            abort(403, 'Acesso Negado. Você não tem permissão para acessar esta funcionalidade.');
            // return redirect('/unauthorized')->with('error', 'Você não tem permissão para acessar esta página.');
        }

        // Se o usuário tem a permissão para a rota atual (e não tem acesso total), concede o acesso
        return $next($request);
    }
}
