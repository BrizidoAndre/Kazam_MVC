@props([
    'model' => new Event()
])
<div class="row">
    <x-input field="name" value="{{old('name', $model->name)}}">
        Name
    </x-input>
</div>

<div class="row">
    <x-input field="slug" value="{{old('slug', $model->slug)}}">
        Slug
    </x-input>
</div>

<div class="row">
    <x-input field="date" value="{{old('date', $model->date)}}" type="date">
        Date
    </x-input>
</div>
<hr class="mb-4">
