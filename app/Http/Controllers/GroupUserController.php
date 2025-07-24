<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Para listar usuários
use App\Models\Group; // Para listar grupos
use App\Models\GroupUser; // Nosso novo modelo para a tabela pivô
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GroupUserController extends Controller
{
    /**
     * Display a listing of the resource (Associações de Usuários a Grupos).
     * Exibe uma listagem das associações de usuários a grupos.
     */
    public function index()
    {
        // Carrega todas as associações de group_user, com os dados do usuário e do grupo
        $groupUsers = GroupUser::with(['user', 'group'])->get();
        return view("group_user.showAll", ["data" => $groupUsers]);
    }

    /**
     * Show the form for creating a new association.
     * Exibe o formulário para criar uma nova associação de usuário a grupo.
     */
    public function create()
    {
        $users = User::all(); // Obtém todos os usuários
        $groups = Group::all(); // Obtém todos os grupos
        return view("group_user.create", compact('users', 'groups'));
    }

    /**
     * Store a newly created association in storage.
     * Armazena uma nova associação de usuário a grupo.
     */
    public function store(Request $request)
    {

        try {
            $validatedData = $request->validate([
                'user_id' => 'required|string|exists:users,id', // Valida se o user_id existe
                'group_id' => 'required|string|exists:groups,id', // Valida se o group_id existe
            ]);

            // Verifica se a associação já existe para evitar duplicatas
            $existingAssociation = GroupUser::where('user_id', $validatedData['user_id'])
                                            ->where('group_id', $validatedData['group_id'])
                                            ->first();

            if ($existingAssociation) {
                return redirect()->back()
                    ->with('error', 'Este usuário já está associado a este grupo.')
                    ->withInput();
            }

            // Cria a nova associação
            GroupUser::create($validatedData);

            return redirect()->route('group_users')
                ->with('success', 'Associação criada com sucesso!');

        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao criar a associação: ' . $e->getMessage())
                ->withInput();
                
        }
    }

    /**
     * Remove the specified association from storage.
     * Remove a associação de usuário a grupo especificada.
     * Note: Para tabelas pivô com chave primária composta, o destroy precisa de ambos os IDs.
     */
    
      public function destroy(string $user_id, string $group_id)
    {
        try {
            // **MUDANÇA AQUI:** Usamos o Query Builder para deletar diretamente
            $deletedCount = GroupUser::where('user_id', $user_id)
                                     ->where('group_id', $group_id)
                                     ->delete(); // Retorna o número de registros deletados

            if ($deletedCount === 0) {
                // Se nenhum registro foi deletado, significa que não foi encontrado
                throw new ModelNotFoundException("Associação não encontrada para user_id: {$user_id}, group_id: {$group_id}");
            }

            return redirect()->route('group_users')
                ->with('success', 'Associação excluída com sucesso!');

        } catch (ModelNotFoundException $e) {
            // Captura a exceção lançada se nenhum registro for deletado
            return redirect()->back()
                ->with('error', 'Associação não encontrada.');
        } catch (\Exception $e) {
            // Captura outras exceções
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir a associação: ' . $e->getMessage());
        }
    }

    // Não há métodos 'edit' ou 'update' tradicionais para tabelas pivô simples,
    // pois a "edição" seria a exclusão e recriação da associação.
    // Se precisar de uma interface para gerenciar as associações de um usuário ou grupo específico,
    // isso seria feito em outro controller (ex: UserController ou GroupController)
    // ou com métodos adicionais aqui que recebam apenas um user_id ou group_id.
}
