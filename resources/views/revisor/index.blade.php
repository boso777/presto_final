<x-layout>
    <div class="container section-padding">
        <div class="mb-5 pb-5">
            <h1 class="display-3 fw-bold text-lowercase mb-3 mx-2">dashboard revisore</h1>
            <p class="lead text-muted mx-2">revisiona gli articoli in attesa di approvazione.</p>
        </div>

        @if ($article_to_check)
            <div class="row g-5">
                <!-- Article Preview -->
                <div class="col-12 col-lg-7">
                    @if ($article_to_check->images->count() > 0)
                        <div id="revisorCarousel" class="carousel slide shadow-sm mb-4">
                            <div class="carousel-inner">
                                @foreach ($article_to_check->images as $key => $image)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <div class="row align-items-center bg-alt p-3" style="background-color: var(--color-bg-alt);">
                                            <div class="col-12 col-md-8">
                                                <img src="{{ $image->getUrl(600, 600) }}" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="">
                                            </div>
                                            <div class="col-12 col-md-4 small">
                                                <h6 class="fw-bold text-uppercase mb-3">analisi ai</h6>
                                                <div class="mb-2">adult: <span class="badge @if($image->adult == 'VERY_UNLIKELY') bg-success @else bg-danger @endif">{{ $image->adult }}</span></div>
                                                <div class="mb-2">spoof: <span class="badge @if($image->spoof == 'VERY_UNLIKELY') bg-success @else bg-danger @endif">{{ $image->spoof }}</span></div>
                                                <div class="mb-2">medical: <span class="badge @if($image->medical == 'VERY_UNLIKELY') bg-success @else bg-danger @endif">{{ $image->medical }}</span></div>
                                                <div class="mb-2">violence: <span class="badge @if($image->violence == 'VERY_UNLIKELY') bg-success @else bg-danger @endif">{{ $image->violence }}</span></div>
                                                <div class="mb-4">racy: <span class="badge @if($image->racy == 'VERY_UNLIKELY') bg-success @else bg-danger @endif">{{ $image->racy }}</span></div>
                                                
                                                <h6 class="fw-bold text-uppercase mb-2">labels</h6>
                                                @if($image->labels)
                                                    @foreach($image->labels as $label)
                                                        <span class="text-muted">#{{ $label }} </span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if ($article_to_check->images->count() > 1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#revisorCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#revisorCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                </button>
                            @endif
                        </div>
                    @else
                        <div class="bg-alt d-flex align-items-center justify-content-center shadow-sm mb-4" style="height: 400px; background-color: var(--color-bg-alt);">
                            <p class="text-muted">nessuna immagine fornita</p>
                        </div>
                    @endif
                </div>

                <!-- Article Info & Actions -->
                <div class="col-12 col-lg-5">
                    <div class="bg-white p-5 shadow-sm h-100" style="border: 1px solid var(--color-bg-soft);">
                        <div class="mb-4">
                            <span class="text-primary small text-uppercase fw-bold">{{ $article_to_check->category->name }}</span>
                            <h2 class="display-6 fw-bold text-lowercase mt-1">{{ $article_to_check->title }}</h2>
                            <p class="h4 color-primary fw-bold" style="color: var(--color-primary);">{{ $article_to_check->price }} €</p>
                        </div>

                        <div class="mb-5">
                            <h6 class="text-uppercase fw-bold small text-muted mb-2">descrizione</h6>
                            <p class="text-muted">{{ $article_to_check->description }}</p>
                        </div>

                        <div class="d-flex gap-3 pt-4 border-top">
                            <form action="{{ route('revisor.accept', ['article' => $article_to_check]) }}" method="POST" class="flex-grow-1">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success w-100 py-3 text-white border-0" style="background-color: #a5a58d !important; border-radius: 0 !important;">approva</button>
                            </form>
                            <form action="{{ route('revisor.reject', ['article' => $article_to_check]) }}" method="POST" class="flex-grow-1">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger w-100 py-3 text-white border-0" style="background-color: #cb997e !important; border-radius: 0 !important;">rifiuta</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-5 mt-5">
                <h2 class="text-muted fw-light mb-4 text-lowercase">non ci sono articoli da revisionare.</h2>
                <a href="{{ route('homepage') }}" class="btn btn-outline-primary px-5 py-3">torna alla home</a>
            </div>
        @endif
    </div>
</x-layout>