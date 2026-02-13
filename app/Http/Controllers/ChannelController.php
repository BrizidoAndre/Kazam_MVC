<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChannelRequest;
use App\Models\Channel;
use App\Models\Event;

class ChannelController extends Controller
{
    public function index(Event $model)
    {
        return view('channels.create', [
            'model' => $model
        ]);
    }

    public function store(ChannelRequest $request, Event $model)
    {
        Channel::create([
            'name' => $request->post('name'),
            'event_id' => $model->getKey(),
        ]);
        session()->flash('info', 'Channel successfully created');
        return redirect()->route('events.show', $model);
    }
}
