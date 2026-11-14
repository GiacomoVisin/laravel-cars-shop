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
        </div>
    </div>
@endsection