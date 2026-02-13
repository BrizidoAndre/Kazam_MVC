<x-layout-header>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link active" href="{{route('events.index')}}">Manage
                                Events</a></li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Manage Events</h1>
                </div>

                <div class="mb-3 pt-3 pb-2">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                        <h2 class="h4">Create new event</h2>
                    </div>
                </div>

                <x-form class="needs-validation" novalidate action="{{route('events.store')}}" method="post">
                    <x-event-form :model="$model"/>
                    <button class="btn btn-primary" type="submit">Save event</button>
                    <a href="{{route('events.index')}}" class="btn btn-link">Cancel</a>
                </x-form>

            </main>
        </div>
    </div>
</x-layout-header>
