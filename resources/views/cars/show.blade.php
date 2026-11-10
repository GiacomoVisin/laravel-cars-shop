@extends('layouts.carsLayout')

@section('title', 'Dettaglio Auto: ' . $car->name)

@section('content')
    <div class="container my-5">

        {{-- Pulsante Torna Indietro --}}
        <div class="mb-4">
            <a href="{{ route('cars.index') }}" class="btn text-white fw-bold shadow-sm"
                style="background: linear-gradient(135deg, #4a4e51, #2b2d2f); border: 1px solid #6c757d; border-radius: 8px;">
                &larr; Torna al Catalogo
            </a>
        </div>

        {{-- Card Dettaglio Principale --}}
        <div class="card border-0 shadow-lg text-white"
            style="background: linear-gradient(135deg, #5a6268, #343a40); border-radius: 16px; overflow: hidden;">
            <div class="row g-0">

                {{-- Colonna Immagine --}}
                <div class="col-md-6 d-flex align-items-center justify-content-center bg-dark p-3">
                    @if($car->img)
                        <img src="{{ Str::startsWith($car->img, ['http://', 'https://', 'images/']) ? asset($car->img) : asset('storage/' . $car->img) }}"
                            alt="{{ $car->name }}" class="img-fluid rounded shadow-sm"
                            style="max-height: 420px; width: 100%; object-fit: cover;">
                    @else
                        <div class="text-center py-5 text-muted">
                            Nessuna immagine disponibile
                        </div>
                    @endif
                </div>





                {{-- Colonna Informazioni --}}
                <div class="col-md-6 p-4 p-md-5 d-flex flex-column justify-content-between">
                    <div>
                        {{-- Nome Auto e Prezzo --}}
                        <div class="d-flex justify-content-between align-items-start mb-3">

                            <div>
                                <h1 class="fw-bold mb-4">{{ $car->name }}</h1>
                                <span class="badge bg-secondary fs-6">
                                    {{ $car->brand ? $car->brand->name : 'Brand N/D' }}
                                </span>
                            </div>

                            <h2 class="text-white fw-bold mb-0 mt-3">
                                price: € {{ number_format($car->price, 2, ',', '.') }}
                            </h2>
                        </div>

                        <hr class="border-secondary my-4">

                        {{-- Griglia Dettagli (Type, Km, Data, Cliente) --}}
                        <div class="row g-3 mb-4">
                            <div class="col-6">
                                <small class="text-uppercase text-light opacity-75 d-block">Tipologia (Type)</small>
                                <span class="fw-semibold fs-5">
                                    {{ $car->type ? $car->type->name : 'Non specificata' }}
                                </span>
                            </div>

                            <div class="col-6">
                                <small class="text-uppercase text-light opacity-75 d-block">Chilometraggio</small>
                                <span class="fw-semibold fs-5">{{ number_format($car->km, 0, ',', '.') }} km</span>
                            </div>

                            <div class="col-6">
                                <small class="text-uppercase text-light opacity-75 d-block">Immatricolazione</small>
                                <span class="fw-semibold fs-5">
                                    {{ \Carbon\Carbon::parse($car->registration_date)->format('d/m/Y') }}
                                </span>
                            </div>

                            <div class="col-6">
                                <small class="text-uppercase text-light opacity-75 d-block">Cliente / Proprietario</small>
                                <span class="fw-semibold fs-5">
                                    {{ $car->customer ? $car->customer->name : 'Nessuno' }}
                                </span>
                            </div>
                        </div>

                        <hr class="border-secondary my-4">

                        {{-- Descrizione --}}
                        <div class="mb-4">
                            <h5 class="fw-bold mb-2">Descrizione:</h5>
                            <p class="text-light opacity-90" style="white-space: pre-line; line-height: 1.6;">
                                {{ $car->description ? $car->description : 'Nessuna descrizione presente.' }}
                            </p>
                        </div>
                    </div>
                    {{-- Pulsanti Azione (Modifica / Elimina / Torna indietro) --}}
                    <div class="d-flex flex-wrap gap-2 pt-3">
                        <a href="{{ route('cars.edit', $car) }}" class="btn text-white fw-bold px-4 py-2 shadow-sm"
                            style="background: linear-gradient(135deg, #4a4e51, #2b2d2f); border: 1px solid #6c757d; border-radius: 8px;">
                            Modifica Auto
                        </a>

                        {{-- Pulsante che apre la Modal --}}
                        <a href="{{ route('cars.index') }}" class="btn text-white fw-bold px-4 py-2 shadow-sm"
                            style="background: linear-gradient(135deg, #4a4e51, #2b2d2f); border: 1px solid #6c757d; border-radius: 8px;">
                            Torna indietro
                        </a>


                        <button type="button" class="btn btn-danger fw-bold px-4 py-2 shadow-sm" style="border-radius: 8px;"
                            data-bs-toggle="modal" data-bs-target="#deleteCarModal">
                            Elimina Auto
                        </button>

                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Modal di Conferma Eliminazione --}}
    <div class="modal fade" id="deleteCarModal" tabindex="-1" aria-labelledby="deleteCarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-white"
                style="background: linear-gradient(135deg, #4a4e51, #2b2d2f); border: 1px solid #6c757d; border-radius: 12px;">

                <div class="modal-header border-secondary">
                    <h5 class="modal-title fw-bold text-danger" id="deleteCarModalLabel">Conferma Eliminazione</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    Sei sicuro di voler eliminare definitivamente l'auto <strong>{{ $car->name }}</strong>?
                    <br>
                    <small class="text-light opacity-75">Questa azione non potrà essere annullata.</small>
                </div>

                <div class="modal-footer border-secondary">
                    <button type="button" class="btn btn-secondary px-3" data-bs-dismiss="modal"
                        style="border-radius: 6px;">Annulla</button>

                    <form action="{{ route('cars.destroy', $car) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger fw-bold px-3" style="border-radius: 6px;">
                            Elimina Definitivamente
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection