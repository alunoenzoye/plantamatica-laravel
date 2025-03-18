<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view("user.index");
    }
    
    public function create() {
        return view("user.create");
    }
    
    public function show() {
        $user = User::orderByDesc('id')->get();

        return view("user.users", ["user" => $user]);
    }

    public function show_user(User $user) {
        return view("user.show" , ['user' => $user]);
    }

    public function store(UserRequest $request) {
        $request->validated();

        // dd($request);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
        ]);

        return redirect()->route("user.index")->with("success", "Usuário cadastrado com sucesso.");
    }
}