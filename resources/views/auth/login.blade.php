<x-layout>
    <div class="container">
        <div class="row row-custom d-flex align-items-center justify-content-center">
            <form method="POST" action="{{route('login')}}" class="col-11 col-md-6">
                <x-error></x-error>
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password">
                </div>
               
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-layout>