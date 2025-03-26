@if ($correcte)
    <div class="alert success-container">
        <span class="alert-icon success-icon">✔️</span>
        <div>
            <p class="alert-text success-message">{{ $correcte }}</p>
        </div>
    </div>
@endif

@if (!empty($errors))
    <div class="alert error-container">
        <span class="alert-icon error-icon">⚠️</span>
        <div>
            @foreach ($errors as $error)
                <p class="alert-text error-message">{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif