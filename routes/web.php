<?php

use App\Http\Controllers\ChannelController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('login');
Route::get('/logout', [PublicController::class, 'logout'])->name('logout');
Route::post('/', [PublicController::class, 'logon'])->name('logon');
Route::middleware('auth')->group(function () {
    Route::resource('events', EventController::class)->parameter('events', 'model');
    Route::get('ticket/create/{model}', [TicketController::class, 'index'])->name('ticket.create');
    Route::post('ticket/create/{model}', [TicketController::class, 'store'])->name('ticket.store');
    Route::get('/reports/{model}', [ReportController::class, 'index'])->name('report');
    Route::get('/sessions/{model}', [SessionController::class, 'create'])->name('session.create');
    Route::post('/sessions/{model}', [SessionController::class, 'store'])->name('session.store');
    Route::get('/sessions/edit/{model}/{session}', [SessionController::class, 'edit'])->name('session.edit');
    Route::put('/sessions/edit/{model}/{session}', [SessionController::class, 'update'])->name('session.update');
    Route::get('channel/{model}', [ChannelController::class, 'index'])->name('channel.store');
    Route::post('channel/{model}', [ChannelController::class, 'store'])->name('channel.create');
    Route::get('room/{model}', [RoomController::class, 'index'])->name('room.store');
    Route::post('room/{model}', [RoomController::class, 'store'])->name('room.create');
});
