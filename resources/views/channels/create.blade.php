<x-layout-header>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="{{route('events.index')}}">Manage Events</a></li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>{{$model->name}}</span>
                    </h6>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="{{route('events.show', $model)}}">Overview</a>
                        </li>
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
                <div class="border-bottom mb-3 pt-3 pb-2">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                        <h1 class="h2">{{$model->name}}</h1>
                    </div>
                    <span class="h6">{{$model->date}}</span>
                </div>

                <div class="mb-3 pt-3 pb-2">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                        <h2 class="h4">Create new channel</h2>
                    </div>
                </div>

                <x-form class="needs-validation" novalidate :action="route('channel.create', $model)" method="post">
                    <div class="row">
                        <x-input field="name">
                            Name
                        </x-input>
                    </div>
                    <x-error-list/>
                    <hr class="mb-4">
                    <button class="btn btn-primary" type="submit">Save channel</button>
                    <a href="{{route('events.index')}}" class="btn btn-link">Cancel</a>
                </x-form>

            </main>
        </div>
    </div>
</x-layout-header>
