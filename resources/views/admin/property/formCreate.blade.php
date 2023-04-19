@extends('admin.admin')

@section('title', $property->exists ? 'Editer un bien' : 'Créer un bien')

@section('content')

    <h1>@yield('title')</h1>

    <form action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store',
    ['property' => $property]) }}" method="post">

    @include('shared.input', [
        'label' => 'Titre',
        'name' => 'title',
        'value' => $property->title
    ])

    @csrf
    @method($property->exists ? 'put' : 'post')

    <div>
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
