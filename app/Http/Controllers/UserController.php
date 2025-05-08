<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request) {
        $users = User::when($request->has('name'), function ($whenQuery) use ($request) {
            $whenQuery->where('name', 'like', '%' . $request->name . '%');
        })->when($request->has('email'), function ($whenQuery) use ($request) {
            $whenQuery->where('email', 'like', '%' . $request->email . '%');
        })
        ->orderBy('id')
        ->paginate(10)
        ->withQueryString();

        // dd(Auth::check());

        return view("user.index", [
            'users' => $users,
            'menu' => 'users',
            'name' => $request->name,
            'email' => $request->email
        ]);
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
            $imagePath = '';

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $requestImage = $request->image;
                $extension = $requestImage->extension();
                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

                $request->image->move(public_path('img/users'), $imageName);
                $imagePath = $imageName;
            }

            // Cadastrar no banco de dados na tabela usuários
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'image' => $imagePath,
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

        $imagePath = $user->image;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->image->move(public_path('img/users'), $imageName);
            $imagePath = $imageName;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'image' => $imagePath,
        ]);

        return redirect()->route('user.show', ['user' => $user]);
    }

    public function destroy(User $user) {
        $user->delete();

        return redirect()->route('user.index')->with("success", "Usuário apagado com sucesso.");
    }
}