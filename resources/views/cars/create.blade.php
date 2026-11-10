@extends('layouts.carsLayout')

@section('title', 'Aggiungi macchina al catalogo')

@section('content')

    <h1 class="text-center mb-4" style="background-color: #4a4e51; color: white;">Aggiungi Nuova Auto</h1>

    <div class="container my-5">

        <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Selezione Cliente --}}
            <div class="form-control mb-3 d-flex flex-column border-0 shadow-sm text-white py-3"
                style="background: linear-gradient(135deg, #5a6268, #343a40); border-radius: 12px;">
                <label for="customer_id" class="fw-bold mb-2">Customer</label>
                <select name="customer_id" id="customer_id" class="form-select" style="border-radius: 8px;">
                    <option value="">Seleziona un cliente</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Nome Auto --}}
            <div class="form-control mb-3 d-flex flex-column border-0 shadow-sm text-white py-3"
                style="background: linear-gradient(135deg, #5a6268, #343a40); border-radius: 12px;">
                <label for="name" class="fw-bold mb-2">Car Name</label>
                <input type="text" name="name" id="name" class="form-control" style="border-radius: 8px;" required>
            </div>

            {{-- Selezione Brand --}}
            <div class="form-control mb-3 d-flex flex-column border-0 shadow-sm text-white py-3"
                style="background: linear-gradient(135deg, #5a6268, #343a40); border-radius: 12px;">
                <label for="brand_id" class="fw-bold mb-2">Brand</label>
                <select name="brand_id" id="brand_id" class="form-select" style="border-radius: 8px;">
                    <option value="">Seleziona un Brand</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
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
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Prezzo --}}
            <div class="form-control mb-3 d-flex flex-column border-0 shadow-sm text-white py-3"
                style="background: linear-gradient(135deg, #5a6268, #343a40); border-radius: 12px;">
                <label for="price" class="fw-bold mb-2">Prezzo (€)</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" style="border-radius: 8px;" required>
            </div>

            {{-- Kilometri --}}
            <div class="form-control mb-3 d-flex flex-column border-0 shadow-sm text-white py-3"
                style="background: linear-gradient(135deg, #5a6268, #343a40); border-radius: 12px;">
                <label for="km" class="fw-bold mb-2">Km</label>
                <input type="number" name="km" id="km" class="form-control" style="border-radius: 8px;" required>
            </div>

            {{-- Data Immatricolazione --}}
            <div class="form-control mb-3 d-flex flex-column border-0 shadow-sm text-white py-3"
                style="background: linear-gradient(135deg, #5a6268, #343a40); border-radius: 12px;">
                <label for="registration_date" class="fw-bold mb-2">Data di Immatricolazione</label>
                <input type="date" name="registration_date" id="registration_date" class="form-control" style="border-radius: 8px;" required>
            </div>

            {{-- Upload Immagine --}}
            <div class="form-control mb-3 d-flex flex-column border-0 shadow-sm text-white py-3"
                style="background: linear-gradient(135deg, #5a6268, #343a40); border-radius: 12px;">
                <label for="image" class="fw-bold mb-2">Immagine Auto</label>
                <input type="file" name="image" id="image" class="form-control" style="border-radius: 8px;">
            </div>

            {{-- Descrizione / Note --}}
            <div class="form-control mb-3 d-flex flex-column border-0 shadow-sm text-white py-3"
                style="background: linear-gradient(135deg, #5a6268, #343a40); border-radius: 12px;">
                <label for="description" class="fw-bold mb-2">Descrizione</label>
                <textarea name="description" id="description" class="form-control" rows="3"
                    style="border-radius: 8px;"></textarea>
            </div>

            {{-- Pulsante di Invio --}}
            <button type="submit" class="btn text-white fw-bold shadow-sm w-100 py-2 mt-3 btn-car-grey"
                style="background: linear-gradient(135deg, #4a4e51, #2b2d2f); border: 1px solid #6c757d; border-radius: 10px;"> Aggiungi Auto
            </button>
        </form>

         {{-- Pulsante di Ritorno --}}
        <a class="btn text-white fw-bold shadow-sm w-100 py-2 mt-3 btn-car-grey"
            style="background: linear-gradient(135deg, #4a4e51, #2b2d2f); border: 1px solid #6c757d; border-radius: 10px;"
            href="{{ route('cars.index') }}">Back to Cars </a>
    </div>



    <style>
        .btn-car-grey {
            transition: all 0.5s ease;
        }

        .btn-car-grey:hover {
            transform: translateY(-2px);
        }
    </style>

@endsection