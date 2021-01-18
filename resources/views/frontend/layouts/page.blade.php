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
    <link href="https://vjs.zencdn.net/7.10.2/video-js.css" rel="stylesheet" />
    <script src="https://vjs.zencdn.net/7.10.2/video.min.js"></script>  

    <title>@yield('title')</title>
    <meta name="description" content="Mainkan game Laliga Fantasy Marca berhadiah total Rp. 88 juta di Laligasuperfans.com">
    <meta name="keywords" content="Laliga superfans, m88fc">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="header-container">
        <header>
            @include('frontend.parts._navPage')    
        </header>
    </div>

    <main>
        @yield('content')
    </main>

    
    {{-- include modal --}}
    @include('frontend.parts._modal')

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
                    <a href="https://www.instagram.com/laligasuperfans.com_official/" class="text-white" target="_blank" rel="nofollow noopener"><span class="px-2"> <i
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
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=es6,Array.prototype.includes,CustomEvent,Object.entries,Object.values,URL"></script>

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