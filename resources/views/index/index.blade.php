<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/sass/index/index.scss'])
    <title>Plantamática</title>
</head>
<body>
    <div 
        class="container-fluid bg-dark text-white h-auto position-sticky sticky-top shadow-sm"
    >
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
          <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            Plantamática
          </a>

          <div class="col-md-3 text-end">
            <a href="{{ route('login.index') }}" class="btn btn-outline-primary me-2">Login</a>
            {{-- <button type="button" class="btn btn-outline-primary me-2">Login</button> --}}
            {{-- <button type="button" class="btn btn-primary">Cadastrar</button> --}}
          </div>
        </header>
    </div>

    <main class="container-fluid px-0">
        <div style="height: 100vh">
            <div class="container-fluid text-center m3-5 pt-3 main-header-bg">
                <img
                    src="{{ URL::asset('assets/teste.jpg') }}"
                    class="img-fluid rounded-top mb-5"
                    alt=""
                />
                
                <h1 class="display-1 text-center fw-semibold lh-1">Bem vindo!</h1>
                
                <p class="lead mb-4">Gerencie e organize problemas de forma centralizada, pragmática e organizada.</p>
            </div>
        </div>

        <div class="jumbotron container-fluid mb-5 bg-body-secondary py-3">
            <h1 class="display-4">Plantamática</h1>
            <p class="lead">Um unico aplicativo só para gerenciar todos seus problemas</p>
            <hr class="my-4">
            <p>Faça o login aqui:</p>
            <a class="btn btn-primary btn-lg" href="{{ route('home.index') }}" role="button">Login</a>
        </div>

        <div class="container-fluid d-flex justify-content-center gap-4 py-5 bg-primary bg-gradient">
            <div
                class="card bg-dark text-white"
                style="
                    background-color:$ {
                        1: orangered;
                    }
                    border-color:$ {
                        2: darkblue;
                    }
                "
            >
                {{-- <img class="card-img-top" src="{{ URL::asset('teste.jpg') }}" alt="Title" /> --}}
                <div class="card-body text-center">
                    <h4 class="card-title">Centralizado</h4>
                    <p class="card-text">Todos os problemas em um lugar só</p>
                </div>
            </div>
            <div
                class="card bg-dark text-white"
                style="
                    background-color:$ {
                        1: orangered;
                    }
                    border-color:$ {
                        2: darkblue;
                    }
                "
            >
                {{-- <img class="card-img-top" src="{{ URL::asset('teste.jpg') }}" alt="Title" /> --}}
                <div class="card-body text-center">
                    <h4 class="card-title">Pragmático</h4>
                    <p class="card-text">Facilmente manuseie os problemas em uma interface intuitiva de se usar</p>
                </div>
            </div>
            <div
                class="card bg-dark text-white"
                style="
                    background-color:$ {
                        1: orangered;
                    }
                    border-color:$ {
                        2: darkblue;
                    }
                "
            >
                {{-- <img class="card-img-top" src="{{ URL::asset('teste.jpg') }}" alt="Title" /> --}}
                <div class="card-body text-center">
                    <h4 class="card-title">Organização</h4>
                    <p class="card-text">Filtre e separe chamados por categoria, pendência e mais.</p>
                </div>
            </div>
            
        </div>
    </main>
</body>
</html>