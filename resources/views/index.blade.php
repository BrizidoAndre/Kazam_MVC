<x-layout>
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-6 mx-sm-auto px-4">
                <div class="pt-3 pb-2 mb-3 border-bottom text-center">
                    <h1 class="h2">WorldSkills Event Platform</h1>
                </div>
                <x-form class="form-signin" method="post">
                    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                    <label for="inputEmail" class="sr-only">Email</label>
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" autofocus>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" name="password_hash" class="form-control"
                           placeholder="Password">
                    <x-error-list></x-error-list>
                    @session('info')
                    <p class="text-danger">{{session('info','')}}</p>
                    @endsession
                    <button class="btn btn-lg btn-primary btn-block" id="login" type="submit">Sign in</button>
                </x-form>
            </main>
        </div>
    </div>
</x-layout>
