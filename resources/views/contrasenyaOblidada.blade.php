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
    <title>Recuperar contrasenya</title>
</head>
<body>
    <!-- Afegim el navbar -->
    <x-navbar />

    <div class="content">
        <!-- BODY -->
        <div class="container-general-perfil">
            <form action="{{ route('contrasenyaOblidada') }}" method="post">
                @csrf
                <h2>Heu oblidat la contrasenya?</h2>
                <div class="info-container">
                    <p>Si us plau, introdueix l'adreça de correu electrònic que vas utilitzar per a registrar-te.</p>
                    <p>T'enviarem un mail amb l'enllaç per començar amb el procés de recuperació.</p>
                </div>
                <label for="email">Introdueix el teu correu electrònic:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                
                <input type="submit" name="action" value="Restablir Contrasenya">

                <!-- Component missatges -->
                <x-alertes/>
                <!-- ----------------------------------------------- -->
            </form>
        </div>
    </div>
</body>
</html>