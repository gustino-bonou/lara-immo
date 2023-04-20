@php
    $class ??= null;
    $name ??= '';
    $value ??= [];
    $label ??= ucfirst($name);
@endphp

<div @class(['form-group', $class])>
    <label for="{{ $name }}"> {{ $label }} </label>
       
    <select name="{{ $name }}[]" id="{{ $name }}" multiple>
        @foreach ($options as $key => $value)
        @endforeach
        <option @selected($value->contains($key)) value="{{ $key }}">{{ $value }}</option>
    </select>
     @error($name)
    <div class="invalid-feedback">
        {{ $message }} 
    </div>
    
@enderror
</div>
