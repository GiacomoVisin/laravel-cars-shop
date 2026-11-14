@extends('layouts.carsLayout')

@section('title', 'Pagina per le categorie')

@section('content')
    <h1 class="mb-5"> Benvenuto nelle categorie</h1>
    <div class="container min-vh-100">

        <a href="{{ route('brands.create') }}" class="btn text-white fw-bold px-4 py-2 shadow-sm mb-3"
            style="background: linear-gradient(135deg, #4a4e51, #2b2d2f); border: 1px solid #6c757d; border-radius: 8px;"> Crea nuova Categoria  </a>

        <div class="row">
            @foreach ($brands as $brand)
                <div class="col-md-4 mb-3">
                    <x-brand-car :brand="$brand" />
                </div>
            @endforeach
        </div>
    </div>


@endsection