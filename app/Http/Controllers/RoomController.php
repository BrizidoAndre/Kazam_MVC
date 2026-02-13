<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Event;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Event $model)
    {
        return view('rooms.create', [
            'model' => $model
        ]);
    }

    public function store(RoomRequest $request, Event $model)
    {
        Room::create($request->all());
        session()->flash('info', 'Room successfully created');
        return redirect()->route('events.show', $model);
    }
}
