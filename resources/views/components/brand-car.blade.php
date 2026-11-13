@props(['brand'])


<div class="card">
    <div class="card-body">
        <h3 class="text-white"> {{ $brand->name }} </h3>
        <p> {{ $brand->description }}</p>
    </div>
</div>