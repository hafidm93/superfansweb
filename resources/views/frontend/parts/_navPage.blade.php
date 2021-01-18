<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand" href="{{route('index_site')}}">
        <img src="{{asset('upload/logo/superfans.png')}}" class="logo-page" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item px-lg-2"> <a class="nav-link" href="#"> <span
            class="d-inline-block d-lg-none icon-width"></span>News</a> </li>
        <li class="nav-item px-lg-2"> <a class="nav-link" href="#video"><span
                    class="d-inline-block d-lg-none icon-width"></span>M Video</a> </li>
        <li class="nav-item px-lg-2"> <a class="nav-link" href="#"><span
                    class="d-inline-block d-lg-none icon-width"></span>LaLiga Fantasy</a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Games
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Games 1</a>
                <a class="dropdown-item" href="#">Games 2</a>
            </div>
        </li>
      </ul>
        <div class="text-center">
            @if (Route::has('login'))
        @auth
                    <a class="btn btn-outline-secondary" href="{{route('index_site')}}">
                        Dashboard
                    </a>
                @else
                @if (Route::has('register'))
                        <a class="btn btn-outline-secondary" href="{{route('register')}}">
                            Daftar / Login
                        </a>
                    @endif
                @endauth
        @endif
        </div>
    </div>
  </nav>
