<?php

use App\Models\Event as EventModel;
use Illuminate\Support\Facades\Route;

Route::get('/events', function () {
    $events = EventModel::with('organizer')->get();
    $events = \App\Http\Resources\EventResource::collection($events);
    return ['events' => $events];
});

Route::get('/organizers/{slug}/events/{event}', function ($slug, $event) {
    $organizer = \App\Models\User::first(['slug' => $slug]);
    $event = EventModel::first(['organizer_id' => $organizer->id, 'slug' => $event]);
    return
});
