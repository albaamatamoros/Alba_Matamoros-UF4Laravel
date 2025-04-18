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
    <title>Consulta</title>
</head>
<body>
    <!-- Afegim el navbar -->
    <x-navbar />

    <div class="selectPersonatge">
        <form method="GET" action="{{ route('consultar') }}">
            <select name="ordenacio" onchange="this.form.submit()">
                <option value="asc" {{ $ordenacio == 'asc' ? 'selected' : '' }}>ASC</option>
                <option value="desc" {{ $ordenacio == 'desc' ? 'selected' : '' }}>DESC</option>
            </select>

            <select name="personatgesPerPage" onchange="this.form.submit()">
                <option value="5" {{ $personatgesPerPage == 5 ? 'selected' : '' }}>5</option>
                <option value="10" {{ $personatgesPerPage == 10 ? 'selected' : '' }}>10</option>
                <option value="15" {{ $personatgesPerPage == 15 ? 'selected' : '' }}>15</option>
                <option value="20" {{ $personatgesPerPage == 20 ? 'selected' : '' }}>20</option>
            </select>
        </form>
    </div>

    <!-- TÍTOL -->
    <div class="titulo">
        <h1 class="titulo-personatges">Llista de Personatges</h1>
    </div>


    <div class="search-bar-container">
        <form method="GET" action="{{ route('consultar') }}" class="search-form">
            <input 
                type="search" 
                name="search" 
                placeholder="Cerca..." 
                class="search-input" 
                value="{{ request('search') }}"
            />
            <button type="submit" class="search-button">
                <i class="fa-solid fa-magnifying-glass" style="color: rgb(255, 255, 255);"></i>
            </button>
        </form>
    </div>

    <x-personatges :personatges="$personatges" />
</body>
</html>

