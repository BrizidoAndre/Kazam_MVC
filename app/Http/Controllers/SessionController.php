<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionRequest;
use App\Models\Event;
use App\Models\Session;

class SessionController extends Controller
{
    public function index()
    {

    }

    public function create(Event $model)
    {
        return view('sessions.create', [
            'model' => $model
        ]);
    }

    public function store(SessionRequest $request, Event $model)
    {
        Session::create($request->validated());
        session()->flash('info', 'Session successfully created');
        return redirect()->route('events.show', $model);
    }

    public function edit(Event $model, Session $session)
    {
        return view('sessions.edit', [
            'model' => $model,
            'session' => $session
        ]);
    }

    public function update(SessionRequest $request, Event $model, Session $session)
    {
        $session->update($request->validated());
        session()->flash('info', 'Session successfully updated');
        return redirect()->route('events.show', $model);
    }
}
