<x-layout>
    <!-- Hero Section -->
    <header class="hero-section">
        <div class="container text-center">
            <h1 class="hero-title display-1 mb-0">Presto</h1>
            <p class="lead text-muted text-lowercase mb-5">{{ __('ui.home') }}</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('article.index') }}" class="btn btn-primary px-5">{{ __('ui.allArticles') }}</a>
                @guest
                    <a href="{{ route('register') }}" class="btn btn-outline-primary px-5">{{ __('ui.Register') }}</a>
                @endguest
            </div>
        </div>
    </header>

    <div class="container py-5 mt-5">
        @if(session()->has('errorMessage'))
            <div class="alert alert-danger text-center mb-5" role="alert">
                {{ session('errorMessage') }}
            </div>
        @endif
        @if(session()->has('message'))
            <div class="alert alert-success text-center mb-5" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <div class="row g-4">
            @forelse ($articles as $article)
                <div class="col-12 col-md-6 col-lg-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center py-5 my-5">
                    <h3 class="text-muted fw-light mb-4 text-lowercase">
                        {{ __('ui.noArticles') ?? 'non sono ancora stati creati articoli' }}
                    </h3>
                    @auth
                        <a href="{{ route('article.create') }}" class="btn btn-outline-primary px-5">{{ __('ui.createArticle') }}</a>
                    @endauth
                </div>
            @endforelse
        </div>
    </div>
</x-layout>