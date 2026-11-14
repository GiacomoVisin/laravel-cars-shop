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


                </div>
            </div>
        </div>
    </div>
@endsection