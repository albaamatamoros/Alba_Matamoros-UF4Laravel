<nav>
    <!-- BARRA DE NAVEGACIÓ -->
    <div class="left">
        <a href="{{ route('index') }}">INICI</a>

        @auth
            <a href="{{ route('gestioPersonatges') }}">GESTIÓ DE PERSONATGES</a>
            <a href="{{ route('arxiuPirata') }}">ARXIU PIRATA</a>
        @endauth
    </div>

    <!-- PERFIL -->
    <div tabindex="0" class="perfil">
        @guest
            <!-- Si el usuario NO está autenticado -->
            <a>
                <img src="{{ asset('imatges-users/defaultUser.jpg') }}" class="user-avatar">
                PERFIL
            </a>
            <div class="dropdown-content">
                <a href="{{ route('login') }}">Iniciar sessió</a>
                <a href="{{ route('registre') }}">Registrar-se</a>
            </div>
        @else
            <!-- Si el usuario está autenticado -->
            <a>
                <img src="{{ Auth::user()->imatge ? asset(Auth::user()->imatge) : asset('imatges-users/defaultUser.jpg') }}" class="user-avatar"> {{ Auth::user()->usuari }}
            </a>
            <div class="dropdown-content">
                <a href="{{ route('perfil') }}">Administrar perfil</a>
                <a href="{{ route('lectorQr') }}">Lector QR</a>
                
                @if(Auth::user()->autenticacio == "")
                    <a href="{{ route('canviarContrasenya') }}">Canviar contrasenya</a>
                @endif
                
                @if(Auth::user()->es_admin)
                    <a href="{{ route('administrarUsuaris') }}">Administrar usuaris</a>
                @endif

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Tancar sessió</button>
                </form>
            </div>
        @endguest
    </div>
</nav>
