<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Alba Matamoros Morales -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ESTILS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <title>Gestio de personatges</title>
</head>
<body>
    <!-- Afegim el navbar -->
    <x-navbar />

    <div class="content">
        <div class="container-menu">
        <!-- Botons Inserir/modificar/esborrar i consultar -->
            <a href="{{ route('insertar') }}" class="boto">Inserir</a>
            <a href="{{ route('esborrar') }}" class="boto">Esborrar</a> 
            <a href="{{ route('cercar') }}" class="boto">Modificar</a>
            <a href="{{ route('consultar') }}" class="boto">Consultar</a> 
        </div>
    </div>
</body>
</html>