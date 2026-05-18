<x-layout>
    <div class="container">
        <div class="row row-custom d-flex align-items-center justify-content-center">
            <x-error></x-error>
            
            <form method="POST" action="{{route('register')}}" class="col-11 col-md-6">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control" id="email" value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">password confirmation</label>
                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-layout>