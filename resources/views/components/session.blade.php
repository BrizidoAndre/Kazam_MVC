@props([
    'session' => new \App\Models\Session(),
    'model',
])
<div class="row">
    <div class="col-12 col-lg-4 mb-3">
        <label for="selectType">Type</label>
        <select class="form-control" id="selectType" name="type">
            <option @selected(old('type', $session->type) == 'talk') value="talk" selected>Talk</option>
            <option @selected(old('type', $session->type) == 'workshop') value="workshop">Workshop</option>
        </select>
    </div>
</div>

<div class="row">
    <x-input field="title" value="{{old('title', $session->title)}}">
        Title
    </x-input>
</div>

<div class="row">
    <x-input field="speaker" value="{{old('speaker', $session->speaker)}}">
        Speaker
    </x-input>
</div>

<div class="row">
    <div class="col-12 col-lg-4 mb-3">
        <label for="selectRoom">Room</label>
        <select class="form-control" id="selectRoom" name="room_id">
            @php
                $rooms = \App\Models\Room::with(['channel'])->whereHas('channel', function($query)use($model){
                    $query->where(['event_id' => $model->id]);
                })->get()
            @endphp
            @foreach($rooms as $room)
                <option
                    @selected(old('room_id',$room->id == $session->room_id)) value="{{$room->getKey()}}">{{$room->name}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <x-input field="cost" value="{{old('cost', $session->cost)}}">
        Cost
    </x-input>
</div>

<div class="row">
    <x-input type="date" value="{{old('start', $session->start->format('Y-m-d'))}}" field="start">Start</x-input>
    <x-input type="date" value="{{old('end', $session->end->format('Y-m-d'))}}" field="end">End</x-input>
</div>

<div class="row">
    <div class="col-12 mb-3">
        <label for="textareaDescription">Description</label>
        <textarea class="form-control" id="textareaDescription" name="description" placeholder=""
                  rows="5">{{old('description', $session->description)}}</textarea>
    </div>
</div>

<x-error-list></x-error-list>
