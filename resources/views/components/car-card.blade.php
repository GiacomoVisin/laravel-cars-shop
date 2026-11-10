@props(['car'])

<div class="card h-100 shadow-sm">


    <img src="{{ asset('storage/' . $car->img) }}" alt="{{ $car->name }}" class="card-img-top"
        style="width: 100%; height: 300px; object-fit: cover;">

    <div class="card-body">
        <h5 class="card-title">{{ $car->name }}</h5>
        <p class="card-text mb-1"><strong>Prezzo:</strong> € {{ $car->price }}</p>
        <p class="card-text mb-1"><strong>Km:</strong> {{ $car->km }} km</p>

        <p class="card-text mb-1">
            <strong>Brand:</strong>
            @if($car->brand)
                {{ $car->brand->name }}
            @else
                N/A
            @endif
        </p>

        <p class="card-text mb-1">
            <strong>Type:</strong>
            @if($car->type)
                {{ $car->type->name }}
            @else
                N/A
            @endif
        </p>

        <p class="card-text"><strong>Immatricolazione:</strong> {{ $car->registration_date }}</p>
        <a href="{{ route('cars.show', $car) }}" class="btn text-white fw-bold shadow-sm"
            style="background: linear-gradient(135deg, #4a4e51, #2b2d2f); border: 1px solid #6c757d; border-radius: 8px;">
            Vedi Dettagli </a>
    </div>
</div>