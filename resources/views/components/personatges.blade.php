<div class="user-list">
    
    <!-- ALERTES -->
    <x-alertes/>

    <!-- LLISTAT DE PERSONATGES -->
    <div class="personatges-container">
        @foreach($personatges as $personatge)
            <div class="personatge-box">
                <h3>{{ $personatge->nom }}</h3>
                <p>{{ $personatge->cos }}</p>
                <p>Creador: {{ $personatge->usuari->usuari }}</p>

                @auth
                    @if(auth()->id() === $personatge->usuari_id)
                        <div class="personatge-botons">
                            <!-- Eliminar -->
                            <form action="{{ route('esborrarPersonatgeInici', ['id' => $personatge->id_personatge]) }}" method="POST" onsubmit="return confirm('Segur que vols esborrar aquest personatge?')">
                                @csrf
                                <button type="submit" class="eliminar-btn">
                                    <i class="fa-solid fa-trash" style="color:rgb(255, 119, 119);"></i>
                                </button>
                            </form>

                            <!-- Modificar -->
                            <a class="modificar-btn" href="{{ route('modificar', ['nom' => $personatge->nom]) }}">
                                <i class="fa-solid fa-pen" style="color: #74C0FC;"></i>
                            </a>
                        </div>
                    @endif
                @endauth
            </div>
        @endforeach
    </div>

    <!-- Paginació -->
    <div class="pagination">
        {{ $personatges->links() }}
    </div>
</div>
