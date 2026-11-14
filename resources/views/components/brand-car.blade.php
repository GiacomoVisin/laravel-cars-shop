@props(['brand'])


<div class="card">
    <div class="card-body">
        <h3 class="text-white"> {{ $brand->name }} </h3>
        <p> {{ $brand->description }}</p>

        <a href="{{ route('brands.show', $brand) }}" class="btn text-white fw-bold shadow-sm"
            style="background: linear-gradient(135deg, #4a4e51, #2b2d2f); border: 1px solid #6c757d; border-radius: 8px;">
            Vedi Dettagli </a>
    </div>
</div>