<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{('css/app.css')}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark navigation-top">
            <div class="container-fluid">
              <a  id="logo-fantasy-top"  class="navbar-brand" href="{{route('index_site')}}">
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
                                    <a class="btn btn-outline-secondary" href="{{route('index_site')}}">
                                        {{Auth::user()->name}}
                                    </a>
                                </li>
                                <li class="nav-item px-lg-2">
                                    <a class="btn btn-outline-secondary" href="{{route('index_site')}}">
                                        Dashboard
                                    </a>
                                </li>
                                @else
                                @if (Route::has('register'))
                                    <li class="nav-item px-lg-2">
                                        <a class="btn btn-outline-secondary" href="{{route('register')}}">
                                            Daftar / Login
                                        </a>
                                    </li>
                                    @endif
                                @endauth
                        @endif
                        
                    </ul>
                </div>
              </div>
            </div>
        </nav>
        
        <div id="mainContainer" class="position-static bg-dark mt-5" >
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-md-4 containerLogo">
                        <a href="{{Route('index_site')}}">
                            <img class="pl-3 logo" src="{{asset('upload/logo/superfans.png')}}" alt="">
                        </a>
                    </div>
                    @include('frontend.parts._team')
                </div>
            </div>
    
            <div class="container-fluid pb-5" id="official-content">
                <div class="row">
                    <div class="col m88container" id="header-content">
                        <a href="/">
                            <img class="logo-mob " src="{{asset('upload/logo/superfans.png')}}" alt="">
                        </a>
                        <div class="sponsored">
                            <a href="{{route('index_site')}}">
                                <img data-toggle="tooltip" data-placement="left" title="Official Regional Partner LaLiga"
                                    class="m88logo" src="{{asset('upload/logo/logom88.png')}}" alt="">
                            </a>
                            <a href="{{route('index_site')}}">
                                <img class="laligalogo" src="{{asset('upload/logo/logo-laliga.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-white text-center" id="header-content">
                        <!-- <h5>Official LaLiga Betting Partner 2021/22</h5> -->
                    </div>
                </div>
    
    
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
