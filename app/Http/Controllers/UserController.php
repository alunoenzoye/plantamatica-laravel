<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

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

    // public function generate_pdf() {
    //     $users = User::when($request->has('name'), function ($whenQuery) use ($request) {
    //         $whenQuery->where('name', 'like', '%' . $request->name . '%');
    //     })->when($request->has('email'), function ($whenQuery) use ($request) {
    //         $whenQuery->where('email', 'like', '%' . $request->email . '%');
    //     })
    //     ->orderBy('id')
    //     ->paginate(10)
    //     ->withQueryString();

    //     $pdf = PDF::loadView('user.generate-pdf', ['users' => $users])->setPaper('a4', 'portrait');

    //     return $pdf->download('list_users.pdf');
    // }

    public function generate_pdf(Request $request) {
        $users = User::when($request->has('name'), function ($whenQuery) use ($request) {
            $whenQuery->where('name', 'like', '%' . $request->name . '%');
        })->when($request->has('email'), function ($whenQuery) use ($request) {
            $whenQuery->where('email', 'like', '%' . $request->email . '%');
        })->when($request->filled('start_date_registration'), function ($whenQuery) use ($request) {
            $whenQuery->where('created_at', '>=', \Carbon\Carbon::parse($request->start_date_registration)->format('Y-m-d H:i:s'));
        })->when($request->filled('end_date-registration'), function ($whenQuery) use ($request) {
            $whenQuery->where('created_at', '<=', \Carbon\Carbon::parse($request->end_date_registration)->format('Y-m-d H:i:s'));
        })
        ->orderBy('created_at')
        ->get();

        $totalRecords = $users->count('id');
        $numberRecordsAllowed = 500;

        if ($totalRecords > $numberRecordsAllowed) {
            return redirect()->route('user.index', [
                'name' => $request->name,
                'email' => $request->email,
                'start_date_registration' => $request->start_date_registration,
                'start_date_registration' => $request->end_date_registration,
            ])->with('error', "Limite de registros ultrapassado para gerar PDF. O limite é de $numberRecordsAllowed registros!");
        }

        $pdf = PDF::loadView('user.generate-pdf', ['users' => $users])->setPaper('a4', 'portrait');

        return $pdf->download('list_users.pdf');
    }

    // public function pdfTeste() {
    //     $users = User::orderBy('id')->get();
    //     return view('user.generate-pdf', ['users' => $users]);
    // }
    
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