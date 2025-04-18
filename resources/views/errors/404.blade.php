<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">
    <title>Error 404</title>
</head>
<body>
    <div class="error-container-pagina">
        <h1>Error 404</h1>
        <p>Ho sentim, la pàgina que busques no existeix.</p>
        <a href="{{ route('index') }}">Tornar a l'inici</a>
    </div>
</body>
</html>
