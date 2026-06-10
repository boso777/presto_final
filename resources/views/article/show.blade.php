<x-layout>
    <div class="container section-padding">
        <div class="row g-5">
            <!-- Image Gallery -->
            <div class="col-12 col-lg-7">
                @if ($article->images->count() > 0)
                    <div id="articleCarousel" class="carousel slide">
                        <div class="carousel-inner shadow-sm">
                            @foreach ($article->images as $key => $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ $image->getUrl(600, 600) }}" class="d-block w-100" style="height: 500px; object-fit: cover;"
                                    alt="{{ $article->title }}">
                                </div>
                            @endforeach
                        </div>
                        @if ($article->images->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#articleCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#articleCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @endif
                    </div>
                @else
                    <div class="bg-alt d-flex align-items-center justify-content-center shadow-sm" style="height: 500px; background-color: var(--color-bg-alt);">
                        <p class="text-muted">nessuna immagine disponibile</p>
                    </div>
                @endif
            </div>

            <!-- Article Details -->
            <div class="col-12 col-lg-5">
                <div class="ps-lg-4">
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('homepage') }}" class="text-decoration-none text-muted small">home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('article.index') }}" class="text-decoration-none text-muted small">articoli</a></li>
                            <li class="breadcrumb-item active small" aria-current="page">{{ $article->category->name }}</li>
                        </ol>
                    </nav>

                    <h1 class="display-5 fw-bold mb-3 text-lowercase">{{ $article->title }}</h1>
                    <p class="h2 color-primary fw-bold mb-4" style="color: var(--color-primary);">{{ $article->price }} €</p>
                    
                    <div class="mb-5">
                        <h6 class="text-uppercase fw-bold small text-muted mb-3">descrizione</h6>
                        <p class="lead text-muted">{{ $article->description }}</p>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('article.byCategory', ['category' => $article->category]) }}" class="text-primary text-decoration-none fw-bold text-uppercase small">
                            {{ __('ui.' . $article->category->name) }}
                        </a>
                    </div>
                    
                    <div class="mt-5 pt-5 border-top small text-muted">
                        <p class="mb-1">pubblicato il: {{ $article->created_at->format('d/m/Y') }}</p>
                        <p class="mb-0">venditore: {{ $article->user->name ?? 'Anonimo' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>