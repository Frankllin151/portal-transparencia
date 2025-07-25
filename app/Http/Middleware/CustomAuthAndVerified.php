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

       private $allKeysRoutes = [
        "financeiro" => [
            "receita",
            "despesas",
            "pagamentos",
            "movimentobancario" // Esta é a chave que você vai comparar
        ],
        "servidores",
        "processo",
        "contratos" => [
            "contratos",
            "contratos_item"
        ],
        "parametros" => [ // Corrigido para "parametros" para consistência
            "Tipo Poder",
            "Tipo Ação",
            "Tipo Recurso",
            "Tipo Empenho",
            "Tipo de Conta",
            "Tipo de Contrato",
            "Categoria Empenho",
            "Entidade",
            "Unidade",
            "Nome Orgão",
            "Natureza Receita",
            "Natureza Jurídica",
            "Nome Credor",
            "Finalidade",
            "Forma Ingresso",
            "Forma Julgamento",
            "Classificação",
            "Fonte Recurso",
            "Situação Cargo",
            "Cargos",
            "Classificação do Cargo",
            "Classificação de Afastamento",
            "Vínculo Empregatício",
            "Lotação",
            "Modalidade Licitação",
            "Tipo de Matrícula"
        ]
    ];
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
            return redirect('/login');
        }

        $user = Auth::user();

        // 2. Obter o nome da rota atual
        $currentRouteName = Route::currentRouteName();

        if (is_null($currentRouteName)) {
            return $next($request);
        }

        // Rotas que não precisam de verificação de permissão
        $publicRoutes = ['dashboard', 'home', 'logout', 'profile.edit', "profile.update", "profile.destroy"];
        if (in_array($currentRouteName, $publicRoutes)) {
            return $next($request);
        }

        // 3. Obter as permissões do usuário
        $userPermissions = collect();
        $userGroups = GroupUser::where('user_id', $user->id)
                                ->with('group.permissions')
                                ->get();

        foreach ($userGroups as $groupUser) {
            foreach ($groupUser->group->permissions as $permission) {
                $keys = explode(',', $permission->key);
                foreach ($keys as $key) {
                    $userPermissions->push(trim($key));
                }
            }
        }
        $userPermissions = $userPermissions->unique()->values()->toArray();

        // 4. Verificar se o usuário possui a permissão 'todas'
        if (in_array('todas', $userPermissions)) {
            return $next($request);
        }

        // 5. Normalizar o nome da rota atual para comparação
        // Ex: 'movimentacaobancaria.show' se torna 'movimentacaobancaria'
        // Ex: 'financeiro.receita.create' se torna 'financeiro'
        $normalizedRouteName = explode('.', $currentRouteName)[0];

        // Se a rota for algo como 'movimentacaobancaria.show' e a permissão for 'movimentobancario',
        // precisamos de uma lógica para mapear.
        // Vamos iterar sobre as permissões do usuário e ver se alguma delas
        // corresponde ao prefixo da rota ou a um mapeamento específico.

        $hasPermission = false;

        // Primeiro, verifica se o nome da rota (ou a parte normalizada) está diretamente nas permissões
        if (in_array($currentRouteName, $userPermissions) || in_array($normalizedRouteName, $userPermissions)) {
            $hasPermission = true;
        } else {
            // Lógica para mapear rotas "complexas" para as suas chaves de permissão mais genéricas.
            // Aqui, você pode adicionar mapeamentos específicos se 'movimentacaobancaria'
            // precisar ser tratada como 'movimentobancario'.

            // Exemplo de mapeamento:
            $routeMapping = [
                'movimentacaobancaria' => 'movimentobancario',
                // Adicione outros mapeamentos conforme necessário.
                // Ex: 'contratos_item.edit' => 'contratos_item'
            ];

            foreach ($userPermissions as $permission) {
                // Verifica se a permissão do usuário é um prefixo da rota atual
                // Ex: Se permissão é 'financeiro' e rota é 'financeiro.receita.create'
                if (str_starts_with($currentRouteName, $permission)) {
                    $hasPermission = true;
                    break;
                }

                // Verifica se a permissão do usuário corresponde a um mapeamento da rota normalizada
                // Ex: Se rota normalizada é 'movimentacaobancaria' e mapeia para 'movimentobancario',
                // e 'movimentobancario' está nas permissões do usuário.
                if (isset($routeMapping[$normalizedRouteName]) && $routeMapping[$normalizedRouteName] === $permission) {
                    $hasPermission = true;
                    break;
                }
            }
        }

        if (!$hasPermission) {
            return response()->view('erro_https.403', [], 403);
        }

        return $next($request);
    }
}
