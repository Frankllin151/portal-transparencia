<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\GroupUser;
use App\Models\Group;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
      public function index()
    {
        // 1. Obter o ID do usuário atualmente logado
        $loggedInUserId = Auth::id(); // Retorna o ID do usuário autenticado

        // 2. Carregar todos os usuários, excluindo o usuário logado
        // where('id', '!=', $loggedInUserId) filtra o usuário com o ID logado
        // orderBy('name', 'asc') é uma boa prática para ordenar a lista
        $users = User::where('id', '!=', $loggedInUserId)
                     ->orderBy('name', 'asc')
                     ->get();
        // 3. Passar a lista filtrada de usuários para a view
        return view("cadastrar.showAll", ['data' => $users]);
    }

    public function create()
    {
      return redirect()->route("login");
    }

    public function showid($id)
    {
         try {
            $user = User::findOrFail($id);
           

            // Obter o group_id atual do usuário na tabela pivô
            // Como o formulário de edição tem um select único, pegamos o primeiro grupo associado.
            $currentUserGroupId = null;
            if ($user->groups->isNotEmpty()) {
                $currentUserGroupId = $user->groups->first()->name;
            }
            
        return view("cadastrar.showid", ["data" => $user,
                'currentUserGroupId' => $currentUserGroupId
    ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()
                ->with('error', 'Usuário não encontrado.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir o usuário: ' . $e->getMessage());
        }
    }

    public function createAdmin()
    {
        $groups = Group::all(); // Obtém todos os grupos para o selectbox
        return view("cadastrar.create", compact('groups'));
    }

   


   public function edit(string $id)
    {
        try {
            $user = User::findOrFail($id);
            $groups = Group::all();

            // Obter o group_id atual do usuário na tabela pivô
            // Como o formulário de edição tem um select único, pegamos o primeiro grupo associado.
            $currentUserGroupId = null;
            if ($user->groups->isNotEmpty()) {
                $currentUserGroupId = $user->groups->first()->id;
            }

            return view("cadastrar.edit", [
                'user' => $user,
                'groups' => $groups,
                'currentUserGroupId' => $currentUserGroupId, // Passa o ID do grupo atual para pré-seleção
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()
                ->with('error', 'Usuário não encontrado para edição.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao carregar os dados do usuário: ' . $e->getMessage());
        }
    }

      public function adminUpdate(Request $request, string $id)
    {
        try {
            $user = User::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                // O email deve ser único, EXCETO para o usuário que está sendo editado
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'password' => 'nullable|string|min:8', // Senha é opcional na edição
                'group_id' => 'nullable|uuid|exists:groups,id',
                'cpf' => 'nullable|string|max:14|unique:users,cpf,' . $user->id, // CPF único, exceto para este usuário
                'whatsapp' => 'nullable|string|max:20',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Hash da nova senha se ela for fornecida
            if (!empty($validatedData['password'])) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            } else {
                unset($validatedData['password']); // Remove a senha dos dados validados se não foi alterada
            }

            // Remover caracteres não numéricos do CPF e WhatsApp
            if (isset($validatedData['cpf'])) {
                $validatedData['cpf'] = preg_replace('/\D/', '', $validatedData['cpf']);
            }
            if (isset($validatedData['whatsapp'])) {
                $validatedData['whatsapp'] = preg_replace('/\D/', '', $validatedData['whatsapp']);
            }

            // Prepara os dados do usuário para atualização, removendo group_id temporariamente
            $userDataToUpdate = [
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'cpf' => $validatedData['cpf'] ?? null,
                'whatsapp' => $validatedData['whatsapp'] ?? null,
            ];

            // Adiciona a senha apenas se ela foi fornecida
            if (isset($validatedData['password'])) {
                $userDataToUpdate['password'] = $validatedData['password'];
            }

            // Lidar com o upload da nova foto
            if ($request->hasFile('foto')) {
                // Deletar a foto antiga se existir
                if ($user->foto) {
                    $oldFilePath = str_replace(Storage::url('/'), '', $user->foto);
                    Storage::disk('public')->delete($oldFilePath);
                }
                $path = $request->file('foto')->store('fotos_usuarios', 'public');
                $userDataToUpdate['foto'] = Storage::url($path);
            } elseif ($request->input('clear_foto')) { // Se houver um checkbox ou campo hidden para limpar a foto
                if ($user->foto) {
                    $oldFilePath = str_replace(Storage::url('/'), '', $user->foto);
                    Storage::disk('public')->delete($oldFilePath);
                }
                $userDataToUpdate['foto'] = null;
            }


            // Atualiza os dados principais do usuário
            $user->update($userDataToUpdate);

            // -------------------------------------------------------------------
            // Lógica para atualizar a associação do usuário ao grupo na tabela pivô group_user
            // -------------------------------------------------------------------
            $newGroupId = $request->group_id;

            // Remove todas as associações existentes do usuário com grupos
            $user->groups()->detach();

            // Se um novo group_id foi selecionado, cria a nova associação
            if (!empty($newGroupId)) {
                $user->groups()->attach($newGroupId);
            }
            // -------------------------------------------------------------------

            return redirect()->route('user.lista')
                ->with('success', 'Usuário atualizado com sucesso!');

        } catch (ValidationException $e) {

           
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
           
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao atualizar o usuário: ' . $e->getMessage())
                ->withInput();
        }
    }



     public function storeadmin(Request $request)
    {
    try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8', // Senha mínima de 8 caracteres
                'group_id' => 'nullable|uuid|exists:groups,id', // group_id pode ser nulo, deve ser UUID e existir em groups
                'cpf' => 'nullable|string|max:14|unique:users', // CPF pode ser nulo, único, max 14 caracteres
                'whatsapp' => 'nullable|string|max:20', // WhatsApp pode ser nulo, max 20 caracteres
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Regras de validação para imagem
            ]);

            // Hash da senha antes de salvar
            $validatedData['password'] = Hash::make($validatedData['password']);

            // Remover caracteres não numéricos do CPF e WhatsApp antes de salvar
            if (isset($validatedData['cpf'])) {
                $validatedData['cpf'] = preg_replace('/\D/', '', $validatedData['cpf']);
            }
            if (isset($validatedData['whatsapp'])) {
                $validatedData['whatsapp'] = preg_replace('/\D/', '', $validatedData['whatsapp']);
            }

            // Prepara os dados do usuário, EXCLUINDO o group_id,
            // pois ele será tratado na tabela pivô group_user.
            $userData = [
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
                'cpf' => $validatedData['cpf'] ?? null,
                'whatsapp' => $validatedData['whatsapp'] ?? null,
                // 'group_id' => null, // Não inclua group_id aqui se ele não existe na tabela users ou se a associação é via pivô
            ];

            // Lidar com o upload da foto
            if ($request->hasFile('foto')) {
                $path = $request->file('foto')->store('fotos_usuarios', 'public');
                $userData['foto'] = Storage::url($path);
            } else {
                $userData['foto'] = null;
            }

            // Cria o novo usuário
            $user = User::create($userData);

            // -------------------------------------------------------------------
            // Lógica para associar o usuário ao grupo na tabela pivô group_user
            // -------------------------------------------------------------------
            if ($request->has('group_id') && !empty($request->group_id)) {
                $groupId = $request->group_id;

                // Cria a associação na tabela group_user
                // Não precisamos de um UUID para GroupUser, pois as chaves primárias são user_id e group_id
                GroupUser::create([
                    'user_id' => $user->id,
                    'group_id' => $groupId,
                ]);
            }
            // -------------------------------------------------------------------

            return redirect()->route('user.lista')
                ->with('success', 'Usuário cadastrado com sucesso e associado ao grupo!');

        } catch (ValidationException $e) {
           
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao cadastrar o usuário: ' . $e->getMessage())
                ->withInput();
        }
    }
    /**
     * 
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }




    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);

            // -------------------------------------------------------------------
            // PASSO 1: Remover todas as associações do usuário na tabela pivô group_user
            // O método detach() em um relacionamento belongsToMany remove as entradas na tabela pivô.
            $user->groups()->detach();
            // -------------------------------------------------------------------

            // Opcional: Se o usuário tiver uma foto, você pode deletá-la do storage
            if ($user->foto) {
                $filePath = str_replace(Storage::url('/'), '', $user->foto);
                Storage::disk('public')->delete($filePath);
            }

            // PASSO 2: Deletar o usuário da tabela 'users'
            $user->delete();

            return redirect()->route('users.index')
                ->with('success', 'Usuário excluído com sucesso!');

        } catch (ModelNotFoundException $e) {
            return redirect()->back()
                ->with('error', 'Usuário não encontrado.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao excluir o usuário: ' . $e->getMessage());
        }
    }
}
