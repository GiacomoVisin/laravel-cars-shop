@props(['car'])

<div class="card h-100 shadow-sm">
    <img src="{{ asset($car['img']) }}" 
         alt="{{ $car['name'] }}" 
         class="card-img-top" 
         style="width: 100%; height: 200px; object-fit: cover;">
    
    <div class="card-body">
        <h5 class="card-title">{{ $car['name'] }}</h5>
        <p class="card-text mb-1"><strong>Prezzo:</strong> € {{ $car['price'] }}</p>
        <p class="card-text mb-1"><strong>Km:</strong> {{ $car['km'] }} km</p>
        <p class="card-text"><strong>Immatricolazione:</strong> {{ $car['registration_date'] }}</p>
    </div>
</div>