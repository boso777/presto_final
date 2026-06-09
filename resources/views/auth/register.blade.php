<x-layout>
    <div class="container section-padding">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5">
                <div class="bg-alt p-5 shadow-sm" style="background-color: var(--color-bg-alt);">
                    <h2 class="display-6 fw-bold mb-5 text-center text-lowercase">{{ __('ui.Register') }}</h2>
                    
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <x-error></x-error>
                        
                        <div class="mb-4">
                            <label for="name" class="form-label text-muted small text-uppercase fw-bold">name</label>
                            <input name="name" type="text" class="form-control py-3" id="name" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label text-muted small text-uppercase fw-bold">email address</label>
                            <input name="email" type="email" class="form-control py-3" id="email" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="password" class="form-label text-muted small text-uppercase fw-bold">password</label>
                            <input name="password" type="password" class="form-control py-3" id="password" required>
                        </div>

                        <div class="mb-5">
                            <label for="password_confirmation" class="form-label text-muted small text-uppercase fw-bold">confirm password</label>
                            <input name="password_confirmation" type="password" class="form-control py-3" id="password_confirmation" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 py-3">{{ __('ui.Register') }}</button>
                    </form>
                    
                    <div class="mt-4 text-center small">
                        <span class="text-muted">already have an account?</span>
                        <a href="{{ route('login') }}" class="text-primary text-decoration-none fw-bold">login here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>