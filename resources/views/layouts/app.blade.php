<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'UBeauty')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css_/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css_/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css_/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css_/slicknav.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css_/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css_/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css_/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css_/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css_/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css_/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css_/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">
               <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3 mr-auto">
                                <div class="logo">
                                  <a href="{{route('front.product.index')}}"><img src="front/img/logo/logocoba.png" class="img-fluid" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5 mr-auto">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>              
                                        <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                            <li class="d-none d-xl-block navbar-pad">
                                                <form class="form-inline my-2 my-lg-0" action = "{{route('front.product.index')}}">
                                                    @csrf
                                                    <div class="form-box f-right ">
                                                        <input type="text" name="q" placeholder="Search products">
                                                        <div class="search-icon">
                                                            <i class="fas fa-search special-tag"></i>
                                                        </div>
                                                    </div>
                                                </form>
                                             </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div> 
                            <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                                <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                    <li>
                                        <div class="shopping-card">
                                            <div class="dropdown">
                                                <a type="text" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                                
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a href="{{ route('front.cart.index') }}" class="dropdown-item">Cart</a>
                                                            <a href="{{ route('front.order.index') }}" class="dropdown-item">Order</a>
                                                    </div>
                                            </div>
                                        </div>
                                    </li>
                                        <li>
                                            <div class="d-none d-xl-block">
                                                <div class="favorit-items">
                                                    <div class="dropdown">
                                                            <a type="text" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-user"></i>
                                                            </a>

                                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        
                                                            @guest
                                                                <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                                                                <a href="{{ route('register') }}" class="dropdown-item">Register</a>
                                                            @else
                                                                <a href="#" class="dropdown-item">Hi, {{ Auth::user()->name }}</a>
                                                                <a href="{{ route('logout') }}"
                                                                   onclick="event.preventDefault();
                                                                                 document.getElementById('logout-form').submit();"
                                                                                 class="dropdown-item">
                                                                    Logout
                                                                </a>

                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                    @csrf
                                                                </form>
                                                            @endguest
                                                          </div>
                                                    </div>                                         
                                                </div>
                                            </div>
                                        </li>
                                </ul>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>
        <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            
            <div class="container">
                <a class="navbar-brand" href="{{ route('front.product.index') }}">HOME</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                    <!-- Left Side Of Navbar -->
                    <!-- <ul class="navbar-nav mr-auto">

                    </ul>
                    
                    <form class="form-inline my-2 my-lg-0" action = "{{route('front.product.index')}}">
                        @csrf
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="q">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form> -->

                    <!-- Right Side Of Navbar -->
                    <!-- <ul class="navbar-nav ml-auto"> -->
                        <!-- Authentication Links -->
<!--                         @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('front.order.index') }}">My Order</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('front.cart.index') }}">My Cart</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> -->

        <main class="py-4">
            @yield('content')
        </main>

        <footer>
            <!-- Footer Start-->
            <div class="footer-area footer-padding2">
                <div class="container">
                    <!-- Footer bottom -->
                    <div class="row">
                     <div class="col-xl-7 col-lg-7 col-md-7">
                         <div class="footer-copy-right">
                             <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="ti-heart" aria-hidden="true"></i> by <a href="" target="_blank">ubeauty</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>                   </div>
                     </div>
                      <div class="col-xl-5 col-lg-5 col-md-5">
                         <div class="footer-copy-right f-right">
                             <!-- social -->
                             <div class="footer-social">
                                 <a href="#"><i class="fab fa-twitter"></i></a>
                                 <a href="#"><i class="fab fa-facebook-f"></i></a>
                                 <a href="#"><i class="fab fa-behance"></i></a>
                                 <a href="#"><i class="fas fa-globe"></i></a>
                             </div>
                         </div>
                     </div>
                 </div>
                </div>
            </div>

            <!-- Footer End-->
        </footer>

        <!-- JS here -->
        <!-- All JS Custom Plugins Link Here here -->
        <script src="{{ asset('front/js/vendor/modernizr-3.5.0.min.js') }}" ></script>

        <!-- Jquery, Popper, Bootstrap -->
        <script src="{{ asset('front/js/vendor/jquery-1.12.4.min.js') }}" ></script>
        <script src="{{ asset('front/js/popper.min.js') }}" ></script>
        <script src="{{ asset('front/js/bootstrap.min.js') }}" ></script>

        <!-- Jquery Mobile Menu -->
        <script src="{{ asset('front/js/jquery.slicknav.min.js') }}" ></script>

        <!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{ asset('front/js/owl.carousel.min.js') }}" ></script>
        <script src="{{ asset('front/js/slick.min.js') }}" ></script>

        <!-- One Page, Animated-HeadLin -->
        <script src="{{ asset('front/js/wow.min.js') }}" ></script>
        <script src="{{ asset('front/js/animated.headline.js') }}" ></script>
        <script src="{{ asset('front/js/jquery.magnific-popup.js') }}" ></script>

        <!-- Scrollup, nice-select, sticky -->
        <script src="{{ asset('front/js/jquery.scrollUp.min.js') }}" ></script>
        <script src="{{ asset('front/js/jquery.nice-select.min.js') }}" ></script>
        <script src="{{ asset('front/js/jquery.sticky.js') }}" ></script>
        
        <!-- contact js -->
        <script src="{{ asset('front/js/contact.js') }}" ></script>
        <script src="{{ asset('front/js/jquery.form.js') }}" ></script>
        <script src="{{ asset('front/js/jquery.validate.min.js') }}" ></script>
        <script src="{{ asset('front/js/mail-script.js') }}" ></script>
        <script src="{{ asset('front/js/jquery.ajaxchimp.min.js') }}" ></script>
        
        <!-- Jquery Plugins, main Jquery --> 
        <script src="{{ asset('front/js/plugins.js') }}" ></script>
        <script src="{{ asset('front/js/main.js') }}" ></script>

        <!-- swiper js -->
        <script src="{{ asset('front/js/swiper.min.js') }}" ></script>

            <!-- swiper js -->
        <script src="{{ asset('front/js/mixitup.min.js') }}" ></script>
        <script src="{{ asset('front/js/jquery.counterup.min.js') }}" ></script>
        <script src="{{ asset('front/js/waypoints.min.js') }}" ></script>

        <script src="{{ asset('front/js/custom.js') }}"></script>

    </div>


</body>
</html>
