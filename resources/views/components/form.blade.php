@props([
    'method' => 'get',
    'action' => '',
])

<form action="{{$action}}" method="{{$method === 'get' ? 'get' : 'post'}}" {{$attributes}}>
    @if($method !== 'get')
        @csrf
        @method($method)
    @endif
    {{$slot}}
</form>
