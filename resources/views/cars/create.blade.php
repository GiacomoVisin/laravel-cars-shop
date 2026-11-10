@extends('layouts.carsLayout')

@section('title', 'Aggiungi macchina al catalogo')

@section('content')
<form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    
    {{-- Selezione Cliente (Menu a tendina) --}}
    <div class="form-control mb-3 d-flex flex-column">
        <label for="customer_id">Customer</label>
        <select name="customer_id" id="customer_id">
            <option value="">Seleziona un cliente</option>
            @foreach ($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            @endforeach
        </select>
    </div>

    
        {{-- Nome Auto --}}
        <div class="form-control mb-3 d-flex flex-column">
            <label for="name">Car Name</label>
            <input type="text" name="name" id="name" required>
        </div>

        {{-- Selezione Brand (Relazione 1-a-Molti) --}}
        <div class="form-control mb-3 d-flex flex-column">
            <label for="brand_id">Brand</label>
            <select name="brand_id" id="brand_id">
                <option value="">Seleziona un Brand</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Selezione Type (Relazione 1-a-Molti) --}}
        <div class="form-control mb-3 d-flex flex-column">
            <label for="type_id">Type</label>
            <select name="type_id" id="type_id">
                <option value="">Seleziona una Tipologia</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Prezzo --}}
        <div class="form-control mb-3 d-flex flex-column">
            <label for="price">Prezzo (€)</label>
            <input type="number" step="0.01" name="price" id="price" required>
        </div>

        {{-- Chilometraggio --}}
        <div class="form-control mb-3 d-flex flex-column">
            <label for="km">Km</label>
            <input type="number" name="km" id="km" required>
        </div>

        {{-- Data Immatricolazione --}}
        <div class="form-control mb-3 d-flex flex-column">
            <label for="registration_date">Data di Immatricolazione</label>
            <input type="date" name="registration_date" id="registration_date" required>
        </div>


        {{-- Upload Immagine --}}
        <div class="form-control mb-3 d-flex flex-column">
            <label for="image">Immagine Auto</label>
            <input type="file" name="image" id="image">
        </div>

        {{-- Descrizione / Note --}}
        <div class="form-control mb-3 d-flex flex-column">
            <label for="description">Descrizione</label>
            <textarea name="description" id="description" rows="3"></textarea>
        </div>

        <input type="submit" value="Crea Auto" class="btn btn-primary mt-2">
    </form>
@endsection