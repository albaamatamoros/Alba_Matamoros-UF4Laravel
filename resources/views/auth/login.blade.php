<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Alba Matamoros Morales -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ESTILS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">
    <title>Inici de sessió</title>
</head>
<body>
    <!-- Afegim el navbar -->
    <x-navbar />
    <div class="content">
        <div class="container-general-perfil">
            <h2>Iniciar sessió</h2>

            <form action="{{ route('login-usuari') }}" method="POST">
                @csrf
                
                <label for="usuari">Nom d'Usuari:</label>
                <input type="text" id="usuari" name="usuari" class="form-control" value="{{ old('usuari', isset($_COOKIE['usuariNom']) ? $_COOKIE['usuariNom'] : '') }}">

                <label for="contrasenya">Contrasenya:</label>
                <input type="password" id="contrasenya" name="contrasenya">

                @if (session('loginRecaptcha') >= 3)
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6LeA3owqAAAAADrlORuAb9IM9WI7O29mDUwJ0IDP"></div>
                    </div>
                    @error('g-recaptcha-response')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                @endif

                <label for="recorda" class="checkbox-recordam">
                    <input type="checkbox" id="recorda" name="recorda"> Recorda'm
                </label>

                <input type="submit" name="action" value="Iniciar sessió">

                <!-- Component missatges -->
                <x-alertes/>
                <!-- ----------------------------------------------- -->

                <div class="info-container">
                    <a href="{{ route('password') }}">Heu oblidat la contrasenya?</a>
                </div>
            </form>

            <div class="msg-info">
                <p>No tens compte? <a href="{{ route('registre') }}">Registrat</a></p>
            </div>

            <div class="container-iconos">
                <a href="{{ route('social.callback', ['provider' => 'reddit']) }}" class="icono-link">
                    <i class="fa-brands fa-reddit"></i>
                </a>
                <a href="{{ route('social.callback', ['provider' => 'google']) }}" class="icono-link">
                    <i class="fa-brands fa-google-plus"></i>
                </a>
            </div>
        </div>
    </section>
</body>
</html>
