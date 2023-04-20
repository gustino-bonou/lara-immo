@extends('base')

@section('title', 'Tous nos biens')

@section('content')

<div class="bg-light p-5 mb-5 text-center my-2">

    <form action="" method="get" class="container d-flex gap-2">
        <input type="number" placeholder="Surface minimum" name="surface" class="form-control" value="{{ $input['surface'] ?? ''}}">
        <input type="number" placeholder="Nombre de pièce min" name="rooms" id="rooms" class="form-control" value="{{ $input['rooms'] ?? ''}}">
        <input type="number" placeholder="Buget max" name="price"  class="form-control" value="{{ $input['price'] ?? ''}}">
        <input type="text" placeholder="Mot clé" name="title" class="form-control" value="{{ $input['title'] ?? ''}}">
        <button class="btn btn-primary flex-grow-0">
            Rechercher
        </button>
    </form>

</div>

    <div class="container">
        <div class="row">
            @forelse ($properties as $property)
            <div class="col-3 mb-4">
                @include('property.card')
            </div>
            @empty
            <div class="col">
                Aucun bien ne correspon à votre recherche
            </div>
        @endforelse
        </div>
        <div class="container my-4">
            {{ $properties->links() }}
        </div>
    </div>

   
    
@endsection
    
