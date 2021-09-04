<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Web Application Manifest -->
    <link rel="manifest" href="/manifest.json">
    <!-- Chrome for Android theme color -->
    <meta name="theme-color" content="#000000">

    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="PWA">
    <link rel="icon" sizes="512x512" href="/images/icons/icon-512x512.png">

    <link href="/images/icons/splash-640x1136.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-750x1334.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1242x2208.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1125x2436.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-828x1792.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1242x2688.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1536x2048.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1668x2224.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1668x2388.png" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-2048x2732.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />

    <!-- Tile for Win8 -->
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/images/icons/icon-512x512.png">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <style>
        .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: #fff;
        }
        .preloader .loading {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        font: 14px arial;
        }
    </style>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>

    <script src="{{asset('js/app.js')}}" defer></script>

    <!-- Fonts -->
    <link rel="shortcut icon" href="{{asset('image/logo/logo.svg')}}" type="image/x-icon">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">


    {{-- END PWA --}}
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;800&family=Mulish:wght@400;700&display=swap');
    </style>
    {{-- 
        font-family: 'Montserrat', sans-serif;
        font-family: 'Mulish', sans-serif;
        --}}

    <!-- Styles -->
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


    {{-- AWESOME --}}
    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/all.css')}}">
    <script>
        $(document).ready(function(){
        $(".preloader").fadeOut();
        })
    </script>
    @laravelPWA
    @yield('chatscript')
    <!-- Bidan -->


    <!-- End Bidan -->

    <!-- Kader -->

    <!-- End Kader -->
</head>


<body>
    
    <div id="app">
        <div class="preloader">
            <div class="loading">
              <img src="{{asset('load.svg')}}" width="80">
              <p>Harap Tunggu</p>
            </div>
        </div>
        <main class="py-4" >
            <div class="container" style="margin-top: -24px">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="row justify-content-center" style="background-repeat: no-repeat; background-image: url({{asset('image/12.svg')}})">
                            <div class="col-md-10 text-center">
                                <br>
                                <br>
                                <img src="{{asset('image/logo/logo.svg')}}" alt="" srcset="">
                                <br>
                                <br>
                                <h2 class="font-weight-bold sipenpin-title">@yield('title')</h2>
                                <br><br>
                                <div class="card shadow p-3 mb-5 bg-white " style="border-radius: 20px">
                                    @yield('content')
                                </div>
                                    @yield('under-content')
                                <br>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <br><br><br>
    {{-- Button bawah --}}
    <section class="container bottom-nav fixed-bottom py-3 sipenpin-menu-bawah" >
        <div class="row justify-content-center" >
            <div class="col-8">
                <div class="row" style="color: black">
                    <div class="col-4 menu d-flex justify-content-center text-center">
                        <a href="/home" style="text-decoration: none; color: rgb(255, 255, 255)" >
                            <img src="{{asset('image/menu/bot-1.svg')}}" alt="" srcset="">
                        </a>
                    </div>
                    <div class="col-4 menu d-flex justify-content-center text-center">
                        <a href="/berita" style="text-decoration: none; color: rgb(255, 255, 255)" >
                            <img src="{{asset('image/menu/bot-2.svg')}}" alt="" srcset="">
                        </a>
                    </div>
                    <div class="col-4 menu d-flex justify-content-center text-center">
                        <a href="/akun" style="text-decoration: none; color: rgb(255, 255, 255)" >
                            <img src="{{asset('image/menu/bot-3.svg')}}" alt="" srcset="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        // Initialize the service worker
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/serviceworker.js', {
                scope: '.'
            }).then(function (registration) {
                // Registration was successful
                console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
            }, function (err) {
                // registration failed :(
                console.log('Laravel PWA: ServiceWorker registration failed: ', err);
            });
        }
    </script>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    @yield('extraJS')
</body>

</html>
