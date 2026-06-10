<div class="card h-100 border-0 shadow-sm">
    <div class="overflow-hidden">
        <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : 'https://picsum.photos/400/400' }}"
             class="card-img-top w-100" style="height: 250px; object-fit: cover;" alt="{{ $article->title }}">
    </div>
    <div class="card-body d-flex flex-column p-4">
        <div class="mb-2">
            <a href="{{ route('article.byCategory', ['category' => $article->category]) }}" class="text-decoration-none small text-muted text-uppercase fw-bold">
                {{ __('ui.' . $article->category->name) }}
            </a>
        </div>
        <h5 class="card-title mb-1">{{ $article->title }}</h5>
        <p class="card-price fs-5 mb-4">{{ $article->price }} €</p>
        <div class="mt-auto">
            <a href="{{ route('article.show', compact('article')) }}" class="btn btn-primary w-100">
                {{ __('ui.detail') }}
            </a>
        </div>
    </div>
</div>