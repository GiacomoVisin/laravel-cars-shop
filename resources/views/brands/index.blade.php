@extends('layouts.carsLayout')

@section('title', 'Pagina per le categorie')

@section('content')
    <h1> Benvenuto nelle categorie</h1>
    <div class="container min-vh-100">
        <div class="row">
            @foreach ($brands as $brand)
                <div class="col-md-4 mb-3">
                    <x-brand-car :brand="$brand"/>
                </div>
            @endforeach
        </div>
    </div>


@endsection