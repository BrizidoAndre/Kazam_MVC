<x-layout>

    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{route('events.index')}}">Event Platform</a>
        <span class="navbar-organizer w-100">{{$model->organizer->name}}</span>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" id="logout" href="{{route('logout')}}">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="{{route('events.index')}}">Manage Events</a></li>
                    </ul>

                    @if(session()->has('info'))
                        <div class="alert alert-info">
                            {{session('info', '')}}
                        </div>
                    @endif


                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>{{$model->name}}</span>
                    </h6>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link active"
                                                href="{{route('events.show', $model)}}">Overview</a></li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Reports</span>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item"><a class="nav-link" href="{{route('report', $model)}}">Room capacity</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="border-bottom mb-3 pt-3 pb-2 event-title">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                        <h1 class="h2">{{$model->name}}</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group mr-2">
                                <a href="{{route('events.edit', $model)}}" class="btn btn-sm btn-outline-secondary">Edit
                                    event</a>
                            </div>
                        </div>
                    </div>
                    <span class="h6">{{$model->date}}</span>
                </div>

                <!-- Tickets -->
                <div id="tickets" class="mb-3 pt-3 pb-2">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                        <h2 class="h4">Tickets</h2>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group mr-2">
                                <a href="{{route('ticket.create', $model)}}" class="btn btn-sm btn-outline-secondary">
                                    Create new ticket
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row tickets">
                    @foreach($model->eventTickets as $tickets)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">{{$tickets->name}}</h5>
                                    <p class="card-text">{{$tickets->cost}}</p>
                                    @if($tickets->special_validity)
                                        @if($tickets->special_validity['type'] === 'amount')
                                            <p class="card-text">{{$tickets->special_validity['amount']}} tickets
                                                available</p>
                                        @else
                                            <p class="card-text">Available
                                                until {{$tickets->special_validity['date']}}</p>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Sessions -->
                <div id="sessions" class="mb-3 pt-3 pb-2">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                        <h2 class="h4">Sessions</h2>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group mr-2">
                                <a href="{{route('session.create', $model)}}" class="btn btn-sm btn-outline-secondary">
                                    Create new session
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive sessions">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Time</th>
                            <th>Type</th>
                            <th class="w-100">Title</th>
                            <th>Speaker</th>
                            <th>Channel</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sessionsDatabase as $session)
                            <tr>
                                <td class="text-nowrap">{{$session->start->format('H:i')}}
                                    - {{$session->end->format('H:i')}}</td>
                                <td>{{$session->type}}</td>
                                <td>
                                    <a href="{{route('session.edit', compact('model','session'))}}">{{$session->title}}</a>
                                </td>
                                <td class="text-nowrap">{{$session->speaker}}</td>
                                <td class="text-nowrap">{{$session->room->name}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Channels -->
                <div id="channels" class="mb-3 pt-3 pb-2">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                        <h2 class="h4">Channels</h2>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group mr-2">
                                <a href="{{route('channel.store', $model)}}" class="btn btn-sm btn-outline-secondary">
                                    Create new channel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row channels">
                    @foreach($model->channels as $channel)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">{{$channel->name}}</h5>
                                    <p class="card-text">{{$channel->sessions_count}}
                                        sessions, {{$channel->rooms_count}}
                                        room</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Rooms -->
                <div id="rooms" class="mb-3 pt-3 pb-2">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                        <h2 class="h4">Rooms</h2>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group mr-2">
                                <a href="{{route('room.store', $model)}}" class="btn btn-sm btn-outline-secondary">
                                    Create new room
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive rooms">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Capacity</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model->rooms as $room)
                            <tr>
                                <td>{{$room->name}}</td>
                                <td>{{$room->capacity}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </main>
        </div>
    </div>
</x-layout>
