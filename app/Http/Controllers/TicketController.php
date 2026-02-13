<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventTicketRequest;
use App\Models\Event;
use App\Models\EventTicket;

class TicketController extends Controller
{

    public function index(Event $model)
    {

        return view('tickets.create', [
            'model' => $model,
            'ticket' => new EventTicket(),
        ]);
    }

    public function store(EventTicketRequest $request, Event $model)
    {
        $isAmount = request('special_validity') === 'amount';
        if ($request->post('special_validity')) {
            EventTicket::create([
                ...$request->only(['name', 'cost']),
                'special_validity' => json_encode([
                    'type' => request('special_validity'),
                    request('special_validity') => $isAmount ? request('amount') : request('valid_until')
                ]),
                'event_id' => $model->getKey(),
            ]);
        } else {
            EventTicket::create([
                ...$request->only(['name', 'cost']),
                'event_id' => $model->getKey(),
            ]);
        }
        session()->flash('info', 'Ticket successfully created');
        return redirect()->route('events.show', $model);
    }
}
