<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission; // Importe o modelo Permission
use App\Models\Group; // Importe o modelo Group para o select de grupos
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ControllerPermission extends Controller
{

    /**
     * Display a listing of the resource.
     * Exibe uma listagem das permissões.
     */
    public function index()
    {
        $data = Permission::with('group')->orderBy("updated_at", "desc")->get();
        return view("permission.showAll", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     * Exibe o formulário para criar uma nova permissão.
     */
    public function create()
    {
        $groups = Group::all(); // Obtém todos os grupos para o selectbox
        $keysRoutes = [
            'todas',
            "dashboard",
            "financeiro" => [
                "receita", 
                "despesas", 
                "pagamentos",
                "movimentobancario", 
                "comprasdiretas",
            ], 
            "servidores", 
            "processo", 
            "contratos" => [
                "contratos", 
                "contratos_item"
            ], 
            "paramentros" =>[
            'tipopoder',
    'tipoacao',
    'tiporecurso',
    'tipoempenho',
    'tipoconta',
    'tipocontrato',
    'categoriaempenho',
    'entidade',
    'unidade',
    'nomeorgao',
    'natureza',
    'naturezajuridica',
    'nomecredor',
    'finalidade',
    'formaingresso',
    'formajulgamento',
    'classificacao',
    'fonterecurso',
    'situacaocargo',
    'cargos',
    'classificacaocargo',
    'classificacaoafastamento',
    'vinculoempregaticio',
    'lotacao',
    'modalidadelicitacao',
    'tipomatricula.index'
            ]
        ];
        return view("permission.create", ["groups" => $groups , 
        "keysRoutes" => $keysRoutes ]);
    }

    /**
     * Store a newly created resource in storage.
     * Armazena uma permissão recém-criada no armazenamento.
     */
   public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'group_id' => 'required|string|exists:groups,id',
                'key' => 'required|array', // Continua recebendo um array do multi-select
                'key.*' => 'string|max:255', // Cada item do array deve ser uma string
            ]);

            $groupId = $validatedData['group_id'];
            $selectedKeys = $validatedData['key'];

            $group = Group::find($groupId);

            $keysString = ''; // Variável para armazenar a string final

            // Se o grupo for "Administrador", armazena a string "todasroutas"
            if ($group && strtolower($group->name) === 'administrador') {
                $keysString = 'todas';
            } else {
                // Caso contrário, achata o array selecionado e converte para string
                $keysToSaveArray = array_unique($selectedKeys); // Já é um array, só remove duplicatas
                $keysString = implode(',', $keysToSaveArray);
            }

            // Encontra ou cria um registro de permissão para este group_id
            // Se já existir uma permissão para este group_id, ela será atualizada.
            // Caso contrário, uma nova será criada.
            Permission::updateOrCreate(
                ['group_id' => $groupId], // Condição para encontrar o registro
                ['key' => $keysString, 'id' => Str::uuid()->toString()] // Dados para criar/atualizar
            );

            return redirect()->route('permissoes')
                ->with('success', 'Permissões cadastradas/atualizadas com sucesso!');

        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao cadastrar as permissões: ' . $e->getMessage())
                ->withInput();
        }
    }
      
    /**
     * Show the form for editing the specified resource.
     * Exibe o formulário para editar a permissão especificada.
     */
    public function edit(string $id)
    {
        try {
            $keysRoutes = [
            'todas',
            "dashboard",
            "financeiro" => [
                "receita", 
                "despesas", 
                "pagamentos",
                "movimentobancario", 
                "comprasdiretas",
            ], 
            "servidores", 
            "processo", 
            "contratos" => [
                "contratos", 
                "contratos_item"
            ], 
            "paramentros" =>[
        'tipopoder',
    'tipoacao',
    'tiporecurso',
    'tipoempenho',
    'tipoconta',
    'tipocontrato',
    'categoriaempenho',
    'entidade',
    'unidade',
    'nomeorgao',
    'natureza',
    'naturezajuridica',
    'nomecredor',
    'finalidade',
    'formaingresso',
    'formajulgamento',
    'classificacao',
    'fonterecurso',
    'situacaocargo',
    'cargos',
    'classificacaocargo',
    'classificacaoafastamento',
    'vinculoempregaticio',
    'lotacao',
    'modalidadelicitacao',
    'tipomatricula.index'
            ]
        ];

            $data = Permission::with('group')->findOrFail($id);
            $groups = Group::all();
            return view("permission.edit", ["data" => $data, 'groups' => $groups, "keysRoutes" => $keysRoutes]);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()
                ->with('error', 'Permissão não encontrada.');
        }
    }

    /**
     * Update the specified resource in storage.
     * Atualiza a permissão especificada no armazenamento.
     */
    public function update(Request $request, string $id)
    {
        try {
            $permission = Permission::findOrFail($id);

            // Validação agora espera 'key' como um array, assim como no store
            $validatedData = $request->validate([
                'group_id' => 'required|string|exists:groups,id',
                'key' => 'required|array', // Agora espera um array
                'key.*' => 'string|max:255', // Cada item do array deve ser uma string
            ]);

            $groupId = $validatedData['group_id'];
            $selectedKeys = $validatedData['key'];

            $group = Group::find($groupId);

            $keysString = ''; // Variável para armazenar a string final

            // Lógica para determinar o valor de 'key' baseada no nome do grupo
            if ($group && strtolower($group->name) === 'administrador') {
                $keysString = 'todas';
            } else {
                $keysToSaveArray = array_unique($selectedKeys); // Remove duplicatas do array
                $keysString = implode(',', $keysToSaveArray); // Converte o array para string
            }

            // Atualiza o registro de permissão com a string de chaves
            $permission->update(['key' => $keysString]);

            return redirect()->route('permissoes')
                ->with('success', 'Permissão atualizada com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Se a permissão não for encontrada
            return redirect()->back()
                ->with('error', 'Permissão não encontrada para atualização.')
                ->withInput(); // Mantém os dados no formulário
        } catch (ValidationException $e) {
            // Erros de validação
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            // Outros erros
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao atualizar o registro da Permissão: ' . $e->getMessage())
                ->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     * Remove a permissão especificada do armazenamento.
     */
    public function destroy(string $id)
    {
        try {
            $data = Permission::findOrFail($id);
            $data->delete();

            return redirect()->route('permissoes')
                ->with('success', 'Permissão excluída com sucesso!');

        } catch (ModelNotFoundException $e) {
            return redirect()->back()
                ->with('error', 'Permissão não encontrada.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir a Permissão: ' . $e->getMessage());
        }
    }
}
