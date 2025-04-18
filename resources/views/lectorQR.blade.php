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
    <title>Lecotr de QR</title>
</head>
<body>
    <!-- Afegim el navbar -->
    <x-navbar />

    <section class="content">
        <div class="container-lectorQR">
            <h1>Lector QR</h1>
            <p class="QR">Escaneja el codi QR per a obtenir la informació del personatge</p>

            <form action="{{ route('index') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="file" name="imatgeQR" accept="image/*" required>

                <x-alertes/>

                <button type="submit" class="boto" style="margin-top: 15px;" disabled>Llegir QR</button>
            </form>
        </div>
    <div>
</body>
</html>