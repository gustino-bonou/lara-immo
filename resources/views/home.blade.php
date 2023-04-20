@extends('base')

@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Agence Immo</h1>
            <p>Pas de travaux à prévoir après la livraison, matériaux modernes et de qualité, performances énergétiques et acoustiques aux dernières normes, garanties 
                jusqu’à 10 ans après l’achat, des espaces et agencements optimisés,</p>

        </div>

    </div>

    <div class="container">
        <h2>Nos derniers biens</h2>
        <div class="row">

            @foreach ($properties as $property)
                <div class="col">
                    @include('designProperty.card')
                </div>
            @endforeach
        </div>
    </div>
@endsection