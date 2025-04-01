<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Plantamática - Admin</title>
</head>
<body>
    <div class="container-fluid bg-dark text-white">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
          <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            Plantamática
          </a>

          <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="" class="nav-link px-2 link-white">Início</a></li>
            <li><a href="#" class="nav-link px-2 link-secondary">Painel</a></li>
          </ul>

          <div class="col-md-3 text-end">
            {{-- <button type="button" class="btn btn-outline-primary me-2">Login</button> --}}
            <button type="button" class="btn btn-primary">Cadastrar</button>
          </div>
        </header>
      </div>

      <div class="container">
        @yield('content')
      </div>
</body>
</html>