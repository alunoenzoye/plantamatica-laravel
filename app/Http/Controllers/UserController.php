<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {
        $users = User::orderBy('id')->paginate(6);

        // dd(Auth::check());

        return view("user.index", ['users' => $users]);
    }
    
    public function create() {
        return view("user.create");
    }

    public function show_user(User $user) {
        return view("user.show" , ['user' => $user]);
    }

    public function store(UserRequest $request) {
        // Validar o formulário
        $request->validated();

        // Marca o ponto inicial de uma transação
        DB::beginTransaction();

        try {

            // Cadastrar no banco de dados na tabela usuários
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
           
            // Operação é concluída com êxito
            DB::commit();

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('login.index')->with('success', 'Usuário cadastrado com sucesso!');

        } catch (Exception $e) {

            // Operação não é concluída com êxito
            DB::rollBack();

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Usuário não cadastrado!');
        }

        return redirect()->route("user.index")->with("success", "Usuário cadastrado com sucesso.");
    }

    public function edit(User $user) {
        return view('user.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user) {
        $request->validated();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('user.show', ['user' => $user]);
    }

    public function destroy(User $user) {
        $user->delete();

        return redirect()->route('user.index')->with("success", "Usuário apagado com sucesso.");
    }
}