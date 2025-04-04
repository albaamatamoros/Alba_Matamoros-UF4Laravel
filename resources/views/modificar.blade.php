<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Alba Matamoros Morales -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ESTILS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mostrar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/paginacio.css') }}">
    <title>Inici</title>
</head>
<body>
    <!-- Afegim el navbar -->
    <x-navbar />

    <div class="content">
        <!-- MODIFICAR PERSONATGE -->
        <div class="container-accio">
            <h1>MODIFICAR PERSONATGE</h1>

            <form action="{{ route('modificarPersonatge') }}" method="POST">

                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" value="{{ old('nom', $personatge->nom) }}"/>
                    
                <label for="text">Descripció:</label>
                <input type="text" id="text" name="text" value="{{ old('text', $personatge->cos) }}"/>

                <!-- Component missatges -->
                <x-alertes/>
                <!-- ----------------------------------------------- -->

                <!-- MODIFICAR -->
                <div class="button-group">
                    <input type="submit" name="action" value="Modificar" class="boto"/>
                    <a href="{{ route('gestioPersonatges') }}">
                        <button type="button" class="boto">Tornar</button>
                    </a>            
                </div>
            </form>
        </div>
    </div>
</body>
</html>