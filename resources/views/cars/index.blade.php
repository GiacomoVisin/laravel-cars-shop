@extends('layouts.carsLayout')

@section('title', 'BOOLEAN MOTORS G.B.M.')

@section('content')

    {{-- Stile CSS personalizzato per l'effetto hover del bottone grigio/argento --}}
    <style>
        .btn-car-silver {
            background: linear-gradient(135deg, #4a4e51, #2b2d2f);
            border: 1px solid #6c757d;
            color: #ffffff;
            transition: all 0.5s ease;
        }
        .btn-car-silver:hover {
            background: linear-gradient(135deg, #5c6266, #383b3e);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
    </style>

  
    <h1 class="text-center mb-4" style="background-color: #4a4e51; color: white;">BOOLEAN MOTORS G.B.M.</h1>

    <div class="container my-4">
      
        <div class="d-flex justify-content-start mb-4">
            <a class="btn btn-car-silver fw-bold shadow-sm" href="{{ route('cars.create') }}"> + Add new Car </a>
        </div>

        <div class="row">
            @foreach ($cars as $car)
                <div class="col-md-4 mb-3">
                    <x-car-card :car="$car" />
                </div>
            @endforeach
        </div>
    </div>

@endsection