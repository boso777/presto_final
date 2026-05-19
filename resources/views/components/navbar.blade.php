<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('homepage')}}">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @guest
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('login')}}">Login</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="{{route('register')}}">Register</a>
        </li>
        @endguest
        <li class="nav-item">
            <a class="nav-link" href="{{route('article.index')}}">All Articles</a>
          </li>
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Ciao, {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
            </li>
            <form action="{{ route('logout') }}" method="post" class="d-none" id="form-logout">
              @csrf
            </form>
          </ul>
          <li class="nav-item">
            <a class="nav-link" href="{{route('create.article')}}">Create Article</a>
          </li>
        </li>
        @endauth
      </ul>
      
    </div>
  </div>
</nav>