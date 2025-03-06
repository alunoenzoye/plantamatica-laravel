<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $user = User::orderByDesc('id')->get();

        return view("user.index", ["user" => $user]);
    }
    
    public function create() {
        return view("user.create");
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