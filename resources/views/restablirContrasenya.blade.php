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
    <title>Restablir contrasenya</title>
</head>
<body>
    <!-- Afegim el navbar -->
    <x-navbar />

    <div class="container-general-perfil">
        <h2>Canviar Contrasenya</h2>
        <form action="{{ route('restablirCanviContrasenya', $token) }}" method="POST">
            @csrf
            <label for="nova_contrasenya">Nova Contrasenya:</label>
            <input type="password" id="nova_contrasenya" name="nova_contrasenya">

            <label for="confirmar_contrasenya">Confirmar Contrasenya:</label>
            <input type="password" id="confirmar_contrasenya" name="confirmar_contrasenya">

            <input type="submit" name="action" value="Restablir">

            <!-- Component missatges -->
            <x-alertes/>
            <!-- ----------------------------------------------- -->
        </form>
    </div>
</body>
</html>