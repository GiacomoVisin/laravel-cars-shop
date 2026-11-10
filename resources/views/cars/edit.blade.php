@extends('layouts.carsLayout')

@section('title', 'Modifica Car: ' . $car->name)

@section('content')
    <div class="container my-5">
        <h1 class="text-center mb-4" style="background-color: #4a4e51; color: white;">Modifica auto: {{ $car->name }}</h1>

        <form action="{{ route('cars.update', $car) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Selezione Cliente --}}
            <div class="form-control mb-3 d-flex flex-column border-0 shadow-sm text-white py-3"
                style="background: linear-gradient(135deg, #5a6268, #343a40); border-radius: 12px;">
                <label for="customer_id" class="fw-bold mb-2">Customer</label>
                <select name="customer_id" id="customer_id" class="form-select" style="border-radius: 8px;">
                    <option value="">Seleziona un cliente</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ old('customer_id', $car->customer_id) == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Nome Auto --}}
            <div class="form-control mb-3 d-flex flex-column border-0 shadow-sm text-white py-3"
                style="background: linear-gradient(135deg, #5a6268, #343a40); border-radius: 12px;">
                <label for="name" class="fw-bold mb-2">Car Name</label>
                <input type="text" name="name" id="name" class="form-control" style="border-radius: 8px;"
                    value="{{ old('name', $car->name) }}" required>
            </div>

            {{-- Selezione Brand --}}
            <div class="form-control mb-3 d-flex flex-column border-0 shadow-sm text-white py-3"
                style="background: linear-gradient(135deg, #5a6268, #343a40); border-radius: 12px;">
                <label for="brand_id" class="fw-bold mb-2">Brand</label>
                <select name="brand_id" id="brand_id" class="form-select" style="border-radius: 8px;">
                    <option value="">Seleziona un Brand</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ old('brand_id', $car->brand_id) == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Selezione Type --}}
            <div class="form-control mb-3 d-flex flex-column border-0 shadow-sm text-white py-3"
                style="background: linear-gradient(135deg, #5a6268, #343a40); border-radius: 12px;">
                <label for="type_id" class="fw-bold mb-2">Type</label>
                <select name="type_id" id="type_id" class="form-select" style="border-radius: 8px;">
                    <option value="">Seleziona una Tipologia</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ old('type_id', $car->type_id) == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Prezzo --}}
            <div class="form-control mb-3 d-flex flex-column border-0 shadow-sm text-white py-3"
                style="background: linear-gradient(135deg, #5a6268, #343a40); border-radius: 12px;">
                <label for="price" class="fw-bold mb-2">Prezzo (€)</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" style="border-radius: 8px;"
                    value="{{ old('price', $car->price) }}" required>
            </div>

            {{-- Chilometraggio --}}
            <div class="form-control mb-3 d-flex flex-column border-0 shadow-sm text-white py-3"
                style="background: linear-gradient(135deg, #5a6268, #343a40); border-radius: 12px;">
                <label for="km" class="fw-bold mb-2">Km</label>
                <input type="number" name="km" id="km" class="form-control" style="border-radius: 8px;"
                    value="{{ old('km', $car->km) }}" required>
            </div>

            {{-- Data Immatricolazione --}}
            <div class="form-control mb-3 d-flex flex-column border-0 shadow-sm text-white py-3"
                style="background: linear-gradient(135deg, #5a6268, #343a40); border-radius: 12px;">
                <label for="registration_date" class="fw-bold mb-2">Data di Immatricolazione</label>
                <input type="date" name="registration_date" id="registration_date" class="form-control"
                    style="border-radius: 8px;" value="{{ old('registration_date', $car->registration_date) }}" required>
            </div>

            {{-- Upload Immagine con Anteprima Immagine Attuale --}}
            <div class="form-control mb-3 d-flex flex-column border-0 shadow-sm text-white py-3"
                style="background: linear-gradient(135deg, #5a6268, #343a40); border-radius: 12px;">
                <label for="image" class="fw-bold mb-2">Sostituisci Immagine Auto (Opzionale)</label>

                @if($car->img)
                    <div class="mb-2">
                        <small class="d-block mb-1 text-light">Immagine Attuale:</small>
                        <img src="{{ Str::startsWith($car->img, ['http://', 'https://', 'images/']) ? asset($car->img) : asset('storage/' . $car->img) }}"
                            alt="{{ $car->name }}" style="max-height: 100px; border-radius: 6px; object-fit: cover;">
                    </div>
                @endif

                <input type="file" name="image" id="image" class="form-control" style="border-radius: 8px;">
            </div>

            {{-- Descrizione / Note --}}
            <div class="form-control mb-3 d-flex flex-column border-0 shadow-sm text-white py-3"
                style="background: linear-gradient(135deg, #5a6268, #343a40); border-radius: 12px;">
                <label for="description" class="fw-bold mb-2">Descrizione</label>
                <textarea name="description" id="description" class="form-control" rows="3"
                    style="border-radius: 8px;">{{ old('description', $car->description) }}</textarea>
            </div>

            {{-- Pulsanti Azione --}}
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn text-white fw-bold shadow-sm w-100 py-2"
                    style="background: linear-gradient(135deg, #4a4e51, #2b2d2f); border: 1px solid #6c757d; border-radius: 10px;">
                    Aggiorna Auto
                </button>
                <a href="{{ route('cars.index') }}" class="btn btn-outline-secondary w-50 py-2"
                    style="border-radius: 10px;color:white;">
                    Annulla
                </a>
            </div>
        </form>
    </div>
@endsection