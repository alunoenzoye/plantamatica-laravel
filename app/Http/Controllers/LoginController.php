<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;

class LoginController extends Controller
{
    public function index() {
        return view('login.index');
    }

    public function auth(LoginRequest $request) {
        $request->validated();

        $authenticated = Auth::attempt([
            'email' => $request->email, 
            'password' => $request->password, 
        ]);

        if (!$authenticated) {
            return back()->withInput()->with('error', 'E-mail ou senha inválido');
        }

        $user = Auth::user();
        $user = User::find($user->id);

        return redirect()->route('home.index');
    }

    public function register() {
        return view('login.register');
    }

    public function store(UserRequest $request)
    {
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
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('login.index')->with('success', 'Deslogado com sucesso');
    }
}