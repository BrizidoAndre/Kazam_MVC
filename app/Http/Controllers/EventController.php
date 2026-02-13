<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\Session;
use Laravel\Prompts\Concerns\Events;

class EventController extends Controller
{
    public function index()
    {
        $models = Event::withCount(['registrations'])->where(['organizer_id' => auth()->id()])
            ->orderBy('date', 'desc')
            ->get();
        return view('events.index', [
            'models' => $models,
        ]);
    }

    public function show(Event $model)
    {
        if ($model->organizer_id !== auth()->id()) {
            abort(401);
        }

        $model->load(['channels' => function ($query) {
            $query->withCount('rooms');
            $query->withCount('sessions');
        }, 'eventTickets' => function ($query) {
            $query->withCount('registrations');
        }, 'organizer', 'channels.rooms', 'eventTickets.registrations']);
        $sessionsDatabase = Session::with(['room.channel'])->whereHas('room.channel', function ($query) use ($model) {
            $query->where(['event_id' => $model->getKey()]);
        })->get();
        return view('events.detail', [
            'model' => $model,
            'sessionsDatabase' => $sessionsDatabase,
        ]);
    }

    public function create()
    {
        return view('events.create', [
            'model' => new Event()
        ]);
    }

    public function store(EventRequest $request)
    {
        $request->validate([
            'slug' => 'unique:events'
        ], [
            'slug.unique' => 'Slug is already used'
        ]);
        $model = Event::create([
            ...$request->all(),
            'organizer_id' => auth()->id()
        ]);
        session()->flash('info', 'Event successfully created');
        return redirect()->route('events.show', $model);
    }

    public function edit(Event $model)
    {
        return view('events.edit', [
            'model' => $model
        ]);
    }

    public function update(EventRequest $request, Event $model)
    {
        $model->update($request->validated());
        session()->flash('info', 'Event successfully updated');
        return redirect()->route('events.show', $model);
    }
}
