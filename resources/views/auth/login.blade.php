<x-layout>
    <div class="container section-padding">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5">
                <div class="bg-alt p-5 shadow-sm" style="background-color: var(--color-bg-alt);">
                    <h2 class="display-6 fw-bold mb-5 text-center text-lowercase">{{ __('ui.Login') }}</h2>
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <x-error></x-error>
                        
                        <div class="mb-4">
                            <label for="email" class="form-label text-muted small text-uppercase fw-bold">email address</label>
                            <input name="email" type="email" class="form-control py-3" id="email" required>
                        </div>
                        
                        <div class="mb-5">
                            <label for="password" class="form-label text-muted small text-uppercase fw-bold">password</label>
                            <input name="password" type="password" class="form-control py-3" id="password" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 py-3">{{ __('ui.Login') }}</button>
                    </form>
                    
                    <div class="mt-4 text-center small">
                        <span class="text-muted">don't have an account?</span>
                        <a href="{{ route('register') }}" class="text-primary text-decoration-none fw-bold">register here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>