@props([
    'field' =>'',
])
@php
    $id = \Illuminate\Support\Str::random(8);
@endphp

<div class="col-12 col-lg-4 mb-3">
    <label for="{{$id}}">{{$slot}}</label>
    <!-- adding the class is-invalid to the input, shows the invalid feedback below -->
    <input  class="form-control {{$errors->has($field) ? 'is-invalid' : ''}}" id="{{$id}}"
           name="{{$field}}" {{$attributes->merge(['type' =>'text'])}}>
    @error($field)
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
