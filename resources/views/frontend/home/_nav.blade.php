<nav class="navbar navbar-expand-lg navbar-light navigation-top">
    <div class="container-fluid">
      <a  id="logo-fantasy-top"  class="navbar-brand" href="#">
        <img class="pl-3 logo" src="upload/logo/superfans.png" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="col-md-6 col-lg-6 col-xl-5">
            <ul class="navbar-nav">
                <li class="nav-item px-lg-2"> <a class="nav-link" href="#"> <span
                    class="d-inline-block d-lg-none icon-width"></span>News</a> </li>
        <li class="nav-item px-lg-2"> <a class="nav-link" href="#video"><span
                    class="d-inline-block d-lg-none icon-width"></span>M Video</a> </li>
        <li class="nav-item px-lg-2"> <a class="nav-link" href="{{route('fantasy_site')}}"><span
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
        </div>
        <div class="col-3 col-sm-3 text-center" id="searchContainer">
            <!-- <div class="input-group">
                <input type="text" class="form-control" id="search" placeholder="Cari video">
                <div class="input-group-append">
                    <button class="btn btn-secondary" id="btnSearch" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div> -->
        </div>
        <div class="col" id="userLogin">
            <ul class="navbar-nav mr-auto pl-lg-4 float-right" id="topnav-right">
                @if (Route::has('login'))
                        @auth
                        <li class="nav-item px-lg-2">
                            <a class="btn btn-outline-secondary" href="{{route('home')}}">
                                {{Auth::user()->name}}
                            </a>
                        </li>
                        <li class="nav-item px-lg-2">
                            <a class="btn btn-outline-secondary" href="{{route('home')}}">
                                Dashboard
                            </a>
                        </li>
                        @else
                        @if (Route::has('register'))
                            <li class="nav-item px-lg-2">
                                <button type="button" class="btn btn-outline-secondary" data-toggle="modal"
                                    data-target="#registerModal">
                                    Daftar / Login
                                </button>
                            </li>
                            @endif                
                        @endauth
                @endif
                
            </ul>
        </div>
      </div>
    </div>
</nav>