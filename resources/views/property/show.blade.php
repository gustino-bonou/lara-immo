@extends('base')

@section('title')
    {{$property->title}} 
@endsection

@section('content')

    <div class="container mb-10 mt-5" >
            <h1>{{ $property->title }}</h1>
        <h2>{{ $property->rooms }} pièces . {{ $property->surface }}m²</h2>

        <div class="text-primary fw-bold" style="font-size: 4rem;">
            {{ number_format($property->price, thousands_separator: ' ') }}$
        </div>

        <hr>
        <div class="mt-4">
            <h4>Intéressé par ce bien ?</h4>

            <form action="" method="post" class="vstack gap-3">
                @csrf

                <div class="row">
                    @include('shared.input', [
                        'name' => 'firstname',
                        'class' => 'col',
                        'label' => 'Prénom',
                    ])
                    @include('shared.input', [
                        'name' => 'lastname',
                        'class' => 'col',
                        'label' => 'Nom',
                    ])
                </div>

                <div class="row">
                    @include('shared.input', [
                        'name' => 'phone',
                        'class' => 'col',
                        'label' => 'Téléphone',
                    ])
                    @include('shared.input', [
                        'name' => 'email',
                        'class' => 'col',
                        'type' => 'email'
                    ])
                    
                </div>
                @include('shared.input', [
                        'name' => 'message',
                        'class' => 'col',
                        'type' => 'textarea',
                        'label' => 'Votre message',
                    ])

                <div class="btn btn-primary">
                    Nous contacter
                </div>
            </form>
        </div>
        <div class="mt-4">
            <p>
                {{-- Affin d'interpréter ce que l'utilisateur entre comme text, 
                on met ceci --}}

                {!! nl2br($property->description) !!}
            </p>
            <div class="row">
                <div class="col-8">
                    <h2>Caractéristiques</h2>
                    <table class="table table-striped">
                        <tr>
                            <td>Surface Habitable</td>
                            <td>{{ $property->surface }}m²</td>
                        </tr>
                        <tr>
                            <td>Pièces</td>
                            <td>{{ $property->rooms }}</td>
                        </tr>
                        <tr>
                            <td>Nombre de chambres</td>
                            <td>{{ $property->bedrooms }}</td>
                        </tr>
                        <tr>
                            <td>Etage</td>
                            <td>{{ $property->floor ? : 'Rez de chaussé' }}</td>
                        </tr>
                        <tr>
                            <td>Localisation</td>
                            <td>{{ $property->adresse }} <br> {{ $property->city }} <br>
                            Code Postal: {{ $property->postal_code }} </td>
                        </tr>
                        
                    </table>
                </div>

                <div class="col-4 mb-5">
                    <h2>Spécificités</h2>
                    <ul class="list-group">
                        @forelse ($property->options as $option)
                            <li class="list-group-item">
                                {{ $option->name }}
                            </li>
                            @empty
                            
                                Ce bien n'a aucune spécificité
                            
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

    </div>
    
@endsection