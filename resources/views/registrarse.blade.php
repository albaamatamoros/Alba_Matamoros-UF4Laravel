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
    <title>Registrar-se</title>
</head>
<body>
    <!-- Afegim el navbar -->
    <x-navbar />

    <div class="content">
        <!-- BODY -->
        <div class="container-general-perfil">
            <h2>Registrar-se</h2>
            <form action="{{ route('registreUsuari') }}" method="POST">
                @csrf

                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" value="{{ old('nom') }}" />

                <label for="cognoms">Cognoms:</label>
                <input type="text" id="cognoms" name="cognoms" value="{{ old('cognoms') }}" />

                <label for="usuari">Nom d'Usuari:</label>
                <input type="text" id="usuari" name="usuari" value="{{ old('usuari') }}"/>

                <label for="correu">Correu Electrònic:</label>
                <input type="email" id="correu" name="correu" value="{{ old('correu') }}"/>

                <label for="contrasenya">Contrasenya:</label>
                <input type="password" id="contrasenya" name="contrasenya">

                <label for="confirmar_contrasenya">Confirmar Contrasenya:</label>
                <input type="password" id="confirmar_contrasenya" name="confirmar_contrasenya">

                <!-- Component missatges -->
                 <x-alertes/>
                <!-- ----------------------------------------------- -->

                <input type="submit" name="action" value="Registrar-se">
            </form>

            <div class="msg-info">
                <p>Ja tens un compte? <a href="{{ route('login') }}">Inicia sessió</a></p>
            </div>
        </div>
    </div>
</body>
</html>