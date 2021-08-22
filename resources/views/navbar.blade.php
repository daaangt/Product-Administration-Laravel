<nav class="navbar navbar-expand-lg navbar-light shadow bg-blue px-3">
    <div class="container-fluid">
        <div class="navbar-brand">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-white"></span>
            </button>

            <a href="{{ route('homepage') }}">
                <img src="{{ asset('images/logo.png') }}" width="40">
            </a>
        </div>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('homepage') }}">Página Principal</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('products') }}">Cadastrar Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('categories') }}">Cadastrar Categorias</a>
                    </li>
                @endif
            </ul>
        </div>
        @if (Auth::check())
            <div class="btn-group">
                <a class="nav-link dropdown-toggle text-white" id="dropdownMenuButton1" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Bem vindo, {{{ Auth::user()->name }}}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Sair</a></li>
                </ul>
            </div>
        @else
        <a href="{{ route('login') }}" class="nav-link dropdown-toggle text-white" id="dropdownMenuButton1" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            Conectar
        </a>
        @endif
    </div>
</nav>
