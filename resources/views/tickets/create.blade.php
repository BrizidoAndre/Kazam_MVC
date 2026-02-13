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
                        {{--                        --}}
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
                    <span class="h6">{{$model->date->format('d/m/Y')}}</span>
                </div>

                <div class="mb-3 pt-3 pb-2">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                        <h2 class="h4">Create new ticket</h2>
                    </div>
                </div>

                <x-form class="needs-validation" novalidate action="{{route('ticket.store', $model)}}" method="post">

                    <div class="row">
                        <x-input field="name" value="{{old('name',$ticket->name)}}">
                            Name
                        </x-input>
                    </div>

                    <div class="row">
                        <x-input field="cost" value="{{old('cost',$ticket->cost)}}">
                            Cost
                        </x-input>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-4 mb-3">
                            <label for="selectSpecialValidity">Special Validity</label>
                            <select class="form-control" id="selectSpecialValidity" name="special_validity">
                                <option value="" >None</option>
                                <option value="amount" @selected(old('special_validity', false) == 'amount')>Limited
                                    amount
                                </option>
                                <option value="date" @selected(old('special_validity', false) == 'date')>Purchaseable till date</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-4 mb-3">
                            <label for="inputAmount">Maximum amount of tickets to be sold</label>
                            <input type="number" class="form-control" id="inputAmount" name="amount" placeholder=""
                                   value="0">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-4 mb-3">
                            <label for="inputValidTill">Tickets can be sold until</label>
                            <input type="datetime-local"
                                   class="form-control"
                                   id="inputValidTill"
                                   name="valid_until"
                                   placeholder="yyyy-mm-dd HH:MM"
                                   value="">
                        </div>
                    </div>
                    <x-error-list></x-error-list>
                    <hr class="mb-4">
                    <button class="btn btn-primary" type="submit">Save ticket</button>
                    <a href="{{route('events.show', $model)}}" class="btn btn-link">Cancel</a>
                </x-form>

            </main>
        </div>
    </div>
</x-layout-header>
