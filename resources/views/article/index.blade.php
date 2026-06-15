<x-layout>
    <div class="container px-4 section-padding">
        <div class="mb-4 pb-2 mb-lg-5 pb-lg-5">
            <h1 class="display-3 fw-bold text-lowercase mb-3">tutti gli articoli</h1>
            <p class="lead text-muted">dai nuova vita ai tuoi oggetti!</p>
        </div>

        <div class="row g-4">
            @forelse ($articles as $article)
                <div class="col-12 col-md-6 col-lg-3 mb-3 mb-md-0">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <h3 class="text-muted fw-light">
                        {{ __('ui.noArticles') ?? 'non sono ancora stati creati articoli' }}
                    </h3>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4 pt-2 mt-lg-5 pt-lg-5">
            {{ $articles->links() }}
        </div>
    </div>
</x-layout>