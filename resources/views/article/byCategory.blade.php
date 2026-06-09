<x-layout>
    <div class="container section-padding">
        <div class="mb-5 pb-5">
            <h1 class="display-3 fw-bold text-lowercase mb-3">{{ $category->name }}</h1>
            <p class="lead text-muted">scopri tutti gli articoli della categoria {{ $category->name }}.</p>
        </div>

        <div class="row g-4">
            @forelse ($articles as $article)
                <div class="col-12 col-md-6 col-lg-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <h3 class="text-muted fw-light mb-4">
                        nessun articolo in questa categoria.
                    </h3>
                    @auth
                        <a class="btn btn-primary" href="{{ route('article.create') }}">pubblica il primo</a>
                    @endauth
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-5 pt-5">
            {{ $articles->links() }}
        </div>
    </div>
</x-layout>