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
    <title>Inici</title>
</head>
<body>
    <!-- Afegim el navbar -->
    <x-navbar />

    <div class="content-usuaris">
        <div class="usuarios-container">
            <!-- Component missatges -->
            <x-alertes/>
            <!-- ----------------------------------------------- -->
            <h2 class="usuarios-titulo">Llistat d'Usuaris</h2>
            <div class="usuarios-tabla">
                <table>
                    <thead>
                        <tr>
                            <th>Imatge</th>
                            <th>Usuari</th>
                            <th>Nom</th>
                            <th>Cognoms</th>
                            <th>Correu</th>
                            <th>Acció</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuaris as $usuari)
                            <tr>
                                <td>
                                    <img src="{{ asset('imatges-users/usuaris/' . $usuari->imatge) }}" alt="Imatge de {{ $usuari->nom }}" width="50">
                                </td>
                                <td>{{ $usuari->usuari }}</td>
                                <td>{{ $usuari->nom }}</td>
                                <td>{{ $usuari->cognoms }}</td>
                                <td>{{ $usuari->email }}</td>
                                <td>
                                    <form action="{{ route('esborrarUsuari', ['id' => $usuari->id_usuari]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" onclick="return confirm('Estàs segur que vols eliminar aquest usuari?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>