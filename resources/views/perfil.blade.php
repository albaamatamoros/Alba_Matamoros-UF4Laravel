<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Alba Matamoros Morales -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ESTILS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
    <title>Inici</title>
</head>
<body>
    <!-- Afegim el navbar -->
    <x-navbar />

    <div class="container-general-perfil">
        <h2>Administrar perfil</h2>
        <form action="{{ route('actualitzarPerfil') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="container-avatar-user">
                <img src="{{ auth()->user()->image ?? asset('images/defaultUser.jpg') }}" class="avatar-user-perfil" alt="Avatar">
            </div>

            <label for="arxiu">Selecciona un archivo:</label>
            <input type="file" name="arxiu" id="arxiu">

            @if (auth()->user()->is_authenticated == false)
                <label for="username">Nom d'usuari</label>
                <input type="text" id="username" name="username" value="{{ old('username', auth()->user()->username) }}">
            @else
                <label for="username">Nom d'usuari</label>
                <input type="hidden" id="username" name="username" value="{{ auth()->user()->username }}">
                <input type="text" id="user" name="user" value="{{ auth()->user()->username }}" readonly disabled>
            @endif

            @if(auth()->user()->name)
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" value="{{ auth()->user()->name }}" readonly disabled>
            @endif

            @if(auth()->user()->surname)
                <label for="cognom">Cognoms</label>
                <input type="text" id="cognom" name="cognom" value="{{ auth()->user()->surname }}" readonly disabled>
            @endif

            @if(auth()->user()->email)
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" readonly disabled>
            @endif

            <!-- Component missatges -->
            <x-alertes/>
            <!-- ----------------------------------------------- -->

            <input name="action" type="submit" value="Guardar cambios">
        </form>
    </div>
</body>
</html>