<x-layout-header>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link active" href="{{route('events.index')}}">Manage Events</a></li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Manage Events</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <a href="{{route('events.create')}}" class="btn btn-sm btn-outline-secondary">Create new
                                event</a>
                        </div>
                    </div>
                </div>

                <div class="row events">
                    <div class="col-md-4">
                        @foreach($models as $key => $model)
                            <div class="card mb-4 shadow-sm">
                                <a href="{{route('events.show', $model)}}" class="btn text-left event">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$model->name}}</h5>
                                        <p class="card-subtitle">{{$model->date}}</p>
                                        <hr>
                                        <p class="card-text">{{$model->registrations_count}} registrations</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

            </main>
        </div>
    </div>
</x-layout-header>
