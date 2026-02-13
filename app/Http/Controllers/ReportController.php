<?php

namespace App\Http\Controllers;

use App\Models\Event;

class ReportController extends Controller
{
    public function index(Event $model)
    {
        $model->load('channels.rooms.sessions');
        $sessions = $model->channels->flatMap(fn($channel) => $channel->rooms->flatMap(fn($room) => $room->sessions));
        return view('reports.index', compact('model', 'sessions'));
    }
}
