@extends('layouts.carsLayout')

@section('title', 'Dettaglio Categoria: ')

@section('content')
    <div class="container min-vh-100">
        <h1 class="mb-5"> Eccoci nella visualizazzione del brand: {{ $brand->name }} </h1>
        <div class="card">
            <div class="card-body">
                <h3 class="text-white"> {{ $brand->name }} </h3>
                <p> {{ $brand->description }}</p>
            </div>
            <div class="card-footer">

                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('brands.edit', $brand) }}" class="btn text-white fw-bold px-4 py-2 shadow-sm"
                        style="background: linear-gradient(135deg, #4a4e51, #2b2d2f); border: 1px solid #6c757d; border-radius: 8px;">
                        Modifica Auto
                    </a>


                    <a href="{{ route('brands.index') }}" class="btn text-white fw-bold px-4 py-2 shadow-sm"
                        style="background: linear-gradient(135deg, #4a4e51, #2b2d2f); border: 1px solid #6c757d; border-radius: 8px;">
                        Torna indietro
                    </a>




                    <button type="button" class="btn btn-danger fw-bold px-4 py-2 shadow-sm" style="border-radius: 8px;"
                        data-bs-toggle="modal" data-bs-target="#deleteCarModal">
                        Elimina Categoria
                    </button>




                </div>
            </div>
        </div>
    </div>



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
                    Sei sicuro di voler eliminare definitivamente la categoria <strong>{{ $brand->name }}</strong>?
                    <br>
                    <small class="text-light opacity-75">Questa azione non potrà essere annullata.</small>
                </div>

                <div class="modal-footer border-secondary">
                    <button type="button" class="btn btn-secondary px-3" data-bs-dismiss="modal"
                        style="border-radius: 6px;">Annulla</button>

                    <form action="{{ route('brands.destroy', $brand) }}" method="POST">
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