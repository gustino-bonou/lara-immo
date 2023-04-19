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