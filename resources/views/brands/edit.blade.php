@extends('layouts.carsLayout')

@section('title', 'Modifica della Categoria')

@section('content')
    <div class="container min-vh-100">
        <h1 class="mb-5"> Modifica categoria: </h1>
        <form action="{{ route('brands.update', $brand) }}" method="POST">
            @csrf
           @method('PUT')

            <div class="form-control mb-3 d-flex flex-column border-0 shadow-sm text-white py-3"
                style="background: linear-gradient(135deg, #5a6268, #343a40); border-radius: 12px;">
                <label for="name" class="fw-bold mb-2">Nome categoria:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $brand->name }}"  style="border-radius: 8px;" required>
            </div>
            
            <div class="form-control mb-3 d-flex flex-column border-0 shadow-sm text-white py-3"
                style="background: linear-gradient(135deg, #5a6268, #343a40); border-radius: 12px;">
                <label for="description" class="fw-bold mb-2">Descrizione</label>
                <input type="text" name="description" id="description" class="form-control" value="{{ $brand->description }}" style="border-radius: 8px;"required>
            </div>
            
            <button type="submit" class="btn text-white fw-bold shadow-sm w-100 py-2 mt-3 btn-car-grey"
                style="background: linear-gradient(135deg, #4a4e51, #2b2d2f); border: 1px solid #6c757d; border-radius: 10px;">
                Modifica Categoria
            </button>
        </form>
    </div>
@endsection