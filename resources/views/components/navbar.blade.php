<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('homepage') }}">Presto</a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">

                <!-- Search Form -->
                <li class="nav-item me-lg-4 mb-2 mb-lg-0 w-100 my-2 my-md-0" style="">
                    <form action="{{ route('article.search') }}" method="GET" class="position-relative">
                        <input name="query" class="form-control form-control-sm ps-4 pe-5 border-0 bg-soft w-100"
                            type="search" placeholder="cerca..." aria-label="Search"
                            style="background-color: var(--color-bg-soft); border-radius: 50px !important;">
                        <button type="submit" class="btn btn-link position-absolute end-0 top-50 translate-middle-y text-muted p-2" style="border: none !important; border-radius: 50px !important;">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </li>

                <li class="nav-item mb-2 mb-lg-0">
                    <a class="nav-link text-nowrap" href="{{ route('article.index') }}">{{ __('ui.allArticles') }}</a>
                </li>

                <li class="nav-item dropdown mb-2 mb-lg-0">
                    <a class="nav-link dropdown-toggle text-nowrap" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('ui.Categories')}}
                    </a>
                    <ul class="dropdown-menu border-0 shadow-sm">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item text-capitalize py-2"
                                    href="{{ route('article.byCategory', ['category' => $category]) }}">{{ __('ui.' . $category->name) }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                @guest
                    <li class="nav-item mb-2 mb-lg-0">
                        <a class="nav-link text-nowrap" href="{{ route('login') }}">{{ __('ui.Login') }}</a>
                    </li>
                    <li class="nav-item mb-2 mb-lg-0">
                        <a class="nav-link text-nowrap" href="{{ route('register') }}">{{ __('ui.Register') }}</a>
                    </li>
                @endguest

                @auth
                    @if (Auth::user()->is_revisor)
                        <li class="nav-item mx-lg-2 mb-2 mb-lg-0">
                            <a class="nav-link d-flex align-items-center justify-content-between text-nowrap" href="{{ route('revisor.index') }}">
                                {{ __('ui.zonaRevisore') }}
                                <span class="badge bg-primary rounded-pill ms-2" style="border-radius: 50px !important;">
                                    {{ \App\Models\Article::toBeRevisedCount() }}
                                </span>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item mb-2 mb-lg-0">
                        <a class="nav-link text-nowrap" href="{{ route('article.create') }}">{{__('ui.createArticle')}}</a>
                    </li>
                    <li class="nav-item dropdown mb-2 mb-lg-0">
                        <a class="nav-link dropdown-toggle text-nowrap" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm">
                            <li>
                                <a class="dropdown-item py-2" href="#"
                                    onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">logout</a>
                            </li>
                            <form action="{{ route('logout') }}" method="post" class="d-none" id="form-logout">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @endauth

                <li class="nav-item d-flex align-items-center gap-2 mt-2 mt-lg-0 ms-lg-3 text-nowrap">
                    <x-_locale lang="it" />
                    <x-_locale lang="uk" />
                    <x-_locale lang="es" />
                </li>
            </ul>
        </div>
    </div>
</nav>