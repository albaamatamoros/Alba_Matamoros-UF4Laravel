<!-- resources/views/components/user-list-component.blade.php -->

<div class="user-list">
    <!-- Título -->
    <div class="titulo">
        <h1 class="titulo-personatges">Llista de Personatges</h1>
    </div>

    <!-- Mostrar los personajes -->
    @foreach($personatges as $personatge)
        <div class="personatge">
            <h3>{{ $personatge->nom }}</h3>
            <p>{{ $personatge->cos }}</p>
            <p>Per al usuari: {{ $personatge->usuari->nom }}</p>
        </div>
    @endforeach


    <div class="pagination">
        {{ $personatges->links() }}
    </div>
</div>
