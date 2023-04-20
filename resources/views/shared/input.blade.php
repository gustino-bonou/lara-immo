{{-- Ici nous créeon de champs de formulaire réutilisables
    conncernant la gestion des erreurs, on utilise la directive @error()
    de laravel au niveau des formulaire. Et donc dans le champ on verifie s'il y a une erreur,
    dans ce cas, on ajoute une classe is-error
        
    @enderror --}}

@php
    $label ??= null;
    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $value ??= '';
@endphp

<div @class(['form-group', $class])>
    <label for="{{ $name }}"></label>
    <input class="form-group" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value)}}">
</div>
@error($name)

    <div class="invalid-feedback">
        {{ $message }}
    </div>
    
@enderror