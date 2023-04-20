
@extends('admin.admin')

@section('title', $property->exists ? 'Editer un bien' : 'Créer un bien')

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store',
    ['property' => $property]) }}" method="post">

    @csrf
    @method($property->exists ? 'put' : 'post')

   <div class="row">
    @include('shared.input', [
        'name' => 'title',
        'value' => $property->title,
        'class' => 'col',
    ])
    <div class="col row">
        @include('shared.input', [
            'name' => 'surface',
            'value' => $property->surface,
            'class' => 'col',
        ])
        @include('shared.input', [
            'name' => 'price',
            'value' => $property->price,
            'class' => 'col',
            'label' => 'Prix',
        ])
    </div>
   </div>

   @include('shared.input', [
            'name' => 'description',
            'value' => $property->description,
            'type' => 'textarea'
        ])

    <div class="row">
        @include('shared.input', [
            'name' => 'rooms',
            'value' => $property->rooms,
            'class' => 'col',
            'label' => 'Pièces',
        ])
         @include('shared.input', [
            'name' => 'bedrooms',
            'value' => $property->bedrooms,
            'class' => 'col',
            'label' => 'Chambres',
        ])
         @include('shared.input', [
            'name' => 'floor',
            'value' => $property->floor,
            'class' => 'col',
            'label' => 'Etage',
        ])
    </div>

    <div class="row">
        @include('shared.input', [
            'name' => 'adresse',
            'value' => $property->adresse,
            'class' => 'col',
            'label' => 'Adresse',
        ])
         @include('shared.input', [
            'name' => 'city',
            'value' => $property->city,
            'class' => 'col',
            'label' => 'Ville',
        ])
         @include('shared.input', [
            'name' => 'postal_code',
            'value' => $property->postal_code,
            'class' => 'col',
            'label' => 'Code Postal',
        ])
        
    </div>
    @include('shared.select', [
        'label' => 'Options',
        'name' => 'options',
        'value' => $property->options->pluck('id'), 
        'multiple' => true,
        
    ])
    @include('shared.checkbox', [
        'label' => 'Vendu',
        'name' => 'sold',
        'value' => $property->sold,
        'options' => $options
    ])

    

    <div >
        <button class="btn btn-primary">
            @if ($property->exists)

                Modifier
                
            @else
            
                Créer
                
            @endif
                
        </button>
    </div>
    </form>
    
@endsection
