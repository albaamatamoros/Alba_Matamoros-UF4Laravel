<nav>
    <!-- BARRA DE NAVEGACIÓ -->
    <div class="left">
        <a href="{{ route('index') }}">INICI</a>

        @auth
            <a href="{{ route('personatges.index') }}">GESTIÓ DE PERSONATGES</a>
            <a href="{{ route('personatges.arxiu') }}">ARXIU PIRATA</a>
        @endauth
    </div>

    <!-- PERFIL -->
    <div tabindex="0" class="perfil">
        @guest
            <!-- Si el usuario NO está autenticado -->
            <a>
                <img src="{{ asset('imatges/imatgesUsers/defaultUser.jpg') }}" class="user-avatar">
                PERFIL
            </a>
            <div class="dropdown-content">
                <a href="{{ route('login') }}">Iniciar sessió</a>
                <a href="{{ route('register') }}">Registrar-se</a>
            </div>
        @else
            <!-- Si el usuario está autenticado -->
            <a>
                <img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('imatges/imatgesUsers/defaultUser.jpg') }}" 
                     class="user-avatar">
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-content">
                <a href="{{ route('perfil') }}">Administrar perfil</a>
                <a href="{{ route('lector.qr') }}">Lector QR</a>
                
                @if(Auth::user()->autenticacio == "")
                    <a href="{{ route('canviar.contrasenya') }}">Canviar contrasenya</a>
                @endif
                
                @if(Auth::user()->es_admin)
                    <a href="{{ route('admin.usuaris') }}">Administrar usuaris</a>
                @endif

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Tancar sessió</button>
                </form>
            </div>
        @endguest
    </div>
</nav>
