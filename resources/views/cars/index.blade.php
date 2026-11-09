@extends('layouts.carsLayout')

@section('title', 'Cars')

@section('content')
    <h1>Cars</h1>
    <div class="row">
        @foreach ($cars as $car)
            <div class="col-md-4 mb-3">
                <x-car-card :car="$car" />
            </div>
        @endforeach
    </div>
@endsection