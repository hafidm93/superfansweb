<!doctype html>
<html lang="id">

<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CXVWRNWY9S"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-CXVWRNWY9S');
</script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"
        integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg=="
        crossorigin="anonymous"></script>
        

    <script src="{{asset('vendor/js/vue.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css" />

    <title>LaLiga Superfans</title>
    <meta name="description" content="Laliga Superfans merupakan portal fans Laliga terbesar">
    <meta name="keywords" content="Laliga superfans, m88fc">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="header-container">
        <header id="header">
            
            <!-- Top Navigation -->
            @include('frontend.home._nav')
            
            <div id="mainContainer">
                <div class="container-fluid">
                    @if ($errors->any())
                        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                            Isi semua kolum dengan benar, ulangi pendaftaran
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4 containerLogo">
                            <a href="/">
                                <img class="pl-3 logo" src="{{asset('upload/logo/superfans.png')}}" alt="">
                            </a>
                        </div>
                        @include('frontend.parts._team')
                    </div>
                </div>
        
                <div class="container-fluid" id="official-content">
                    <div class="row">
                        <div class="col m88container" id="header-content">
                            <img class="logo-mob " src="upload/logo/superfans.png" alt="">
                            <div class="sponsored">
                                <a href="{{Route('home')}}">
                                    <img data-toggle="tooltip" data-placement="left" title="Official Regional Partner LaLiga"
                                        class="m88logo" src="{{asset('upload/logo/logom88.png')}}" alt="">
                                </a>
                                <img class="laligalogo" src="{{asset('upload/logo/logo-laliga.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-white text-center" id="header-content">
                            <!-- <h5>Official LaLiga Betting Partner 2021/22</h5> -->
                        </div>
                    </div>
        
        
                </div>
                <div class="container" id="CTA-header">
                    <div class="text-center">
                        <div class="col text-white">
                            @if (Route::has('login'))
                                @auth
                                    <a class="btn btn-outline-warning" href="{{route('home')}}">
                                        Masuk Dashboard
                                    </a>
                                @else
                                @if (Route::has('register'))
                                <a href="#" class="w-25 btn btn-cta"  data-toggle="modal" data-target="#registerModal">Daftar</a>
                                    @endif
                                    
                                <a href="{{Route('login')}}" class="w-25 btn btn-cta">Login</a>
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
              
              <div id="mainCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#mainCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#mainCarousel" data-slide-to="1"></li>
                  <!-- <li data-target="#mainCarousel" data-slide-to="2"></li> -->
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-none d-md-inline w-100" src="{{asset('upload/bg/desktop.jpg')}}" alt="First slide">
                    
                    <img class="d-block d-sm-block d-md-none w-100" src="{{asset('upload/bg/mob.jpg')}}" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-none d-md-inline w-100" src="{{asset('upload/bg/banner2.jpg')}}" alt="Second slide">

                    <img class="d-block d-sm-block d-md-none w-100" src="{{asset('upload/bg/banner2-mob.jpg')}}" alt="Second slide">
                    
                  </div>
                  <!-- <div class="carousel-item">
                    <img class="d-block w-100" src="https://i.postimg.cc/0y2F6Gpp/3.jpg" alt="Third slide">
                    
                  </div> -->
                </div>
                <a class="carousel-control-prev" href="#mainCarousel" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#mainCarousel" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            
            
        </header>
    </div>

    @yield('content')

<footer class="container-footer">
    <div class="container text-center text-white">
        <div class="row py-4  mx-auto">
            <div class="col-sm-4">
                &copy; <span id="year"></span> - LALIGASUPERFANS.COM
            </div>
            <div class="col-sm-4 ">
                <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit -->
            </div>
            <div class="col-sm-4">
                <a href="https://www.facebook.com/LaLigasuperfanscom-100798558600708" class="text-white" target="_blank" rel="nofollow noopener"><span class="px-2"><i
                            class="fab fa-facebook"></i></span></a>
                <a href="https://twitter.com/laligasuperfans" class="text-white" target="_blank" rel="nofollow noopener"><span class="px-2"><i
                            class="fab fa-twitter"></i></span></a>
                <a href="https://www.instagram.com/laligasuperfansofficial/" class="text-white" target="_blank" rel="nofollow noopener"><span class="px-2"> <i
                            class="fab fa-instagram-square"></i></i></span></a>
                <a href="https://www.tiktok.com/@laligasuperfans.com" class="text-white" target="_blank" rel="nofollow noopener"><span class="px-2"> <i class="fab fa-tiktok"></i></span></a>
                <a href="https://www.youtube.com/channel/UCKHUjQbB7pZ_Jmg8t8kLS3w" class="text-white" target="_blank" rel="nofollow noopener"><span class="px-2"><i
                    class="fab fa-youtube"></i></span></a>
            </div>
        </div>
    </div>

    {{-- button gabung laligasuperfans.com --}}
    @if (Auth::guest())
    <div id="btnReg">
        <a href="{{route('register')}}" class="btn-register">
            Gabung Sekarang
        </a>
    </div>
    @endif

</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.js">
</script>
<script src="{{asset('js/app.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js"
    integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg=="
    crossorigin="anonymous"></script>
<script src="{{asset('vendor/js/appvue.js')}}"></script>
<script src="{{asset('vendor/js/super.js')}}"></script>
<script src="{{asset('vendor/js/matches.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.plyr.io/3.6.2/plyr.polyfilled.js"></script>

<script>
    $(document).ready(function(){
    $("#otpBtn").click(function(){
        alert("Pastikan nomer Handphone aktif!");
        $("#otp").toggleClass("otp").removeClass("otp-hide");
    });
    
    });
</script>
<script type="text/javascript">
    @if (count($errors) > 0)
        $('#registerModal').modal('show');
    @endif
    </script>

</body>

</html>