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
    <title>Inici</title>
</head>
<body>
    <!-- Afegim el navbar -->
    <x-navbar />

    <div class="content-api">
        <div class="container-botons-api">
            <div class="card">
                <h2>PIRATES</h2>
                <a href="{{ route('obtenirPirates') }}">
                    <img src="/imatges-web/Piratas.jpg">
                </a>
            </div>
            <div class="card">
                <h2>MARINA</h2>
                <a href="{{ route('obtenirPersonatges') }}">
                    <img src="/imatges-web/Marine.webp">
                </a>
            </div>
            <div class="card">
                <h2>PERSONATGES</h2>
                <a href="{{ route('obtenirMarines') }}">
                    <img src="/imatges-web/Personatges.jpg">
                </a>
            </div>
        </div>
    </div>
</body>
</html>