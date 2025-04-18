<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Alba Matamoros Morales -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ESTILS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/proves.css') }}">
    <title>Arxiu pirata</title>
</head>
<body>
    <!-- Afegim el navbar -->
    <x-navbar />

    <div class="container-botons-api">
        <div class="card">
            <h2>PIRATES</h2>
            <a href="{{ route('obtenirPersonatges', ['filtre' => 'Pirates']) }}">
                <img src="/imatges-web/Piratas.jpg">
            </a>
        </div>
        <div class="card">
            <h2>MARINA</h2>
            <a href="{{ route('obtenirPersonatges', ['filtre' => 'Marine']) }}">
                <img src="/imatges-web/Marine.webp">
            </a>
        </div>
        <div class="card">
            <h2>PERSONATGES</h2>
            <a href="{{ route('obtenirPersonatges', ['filtre' => 'Tots']) }}">
                <img src="/imatges-web/Personatges.jpg">
            </a>
        </div>
    </div>

    <div class="content-api">
        <div class="container-personatges-api">
            @foreach($personatges as $personatge)
                <div class="ficha-personaje">
                    <h2 class="titulo-ficha">{{ $personatge['name'] }}</h2>
                    <p><strong>Recompensa:</strong> {{ $personatge['bounty'] }}</p>
                    <p><strong>Tripulació:</strong> {{ $personatge['crew'] }}</p>
                    <p><strong>Fruita:</strong> {{ $personatge['fruit'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>