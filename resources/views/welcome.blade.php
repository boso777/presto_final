<x-layout>
    <div class="row height-custom justify-content-center align-items-center py-5">
        @if(session()->has('errorMessage'))
        <div class="alert alert-danger text-center" role="alert">
            {{ session('errorMessage') }}
        </div>
        @endif
        @if(session()->has('message'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('message') }}
        </div>
        @endif
        <h1 class="text-center fs-1 my-4 ">{{ __('ui.welcome') }}</h1>
    @forelse ($articles as $article)
        <div class="col-12 col-md-3 ">
            <x-card :article="$article" />
        </div>
    @empty
        <div class="col-12">
            <h3 class="text-center">
                Non sono ancora stati creati articoli
            </h3>
        </div>
    @endforelse
</div>
</x-layout>