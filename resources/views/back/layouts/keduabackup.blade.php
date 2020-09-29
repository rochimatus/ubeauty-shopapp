<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Set Title -->
    <title>{{ config('app.name', 'Admin UBeauty') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- copy template -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset(plugins/fontawesome-free/css/all.min.css) }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset(plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css) }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset(plugins/icheck-bootstrap/icheck-bootstrap.min.css) }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset(plugins/jqvmap/jqvmap.min.css) }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset(dist/css/adminlte.min.css) }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset(plugins/overlayScrollbars/css/OverlayScrollbars.min.css) }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset(plugins/daterangepicker/daterangepicker.css) }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset(plugins/summernote/summernote-bs4.css) }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="home.html" class="nav-link">Home</a>
                        </li>
                    </ul>
                    <!-- SEARCH FORM -->
                    <form class="form-inline ml-3">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
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

                    <!-- Main Sidebar Container -->
                    <aside class="main-sidebar sidebar-dark-primary elevation-4">
                        <!-- Brand Logo -->
                        <a href="home.html" class="brand-link">
                            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
                            <span class="brand-text font-weight-light">Admin UBeauty</span>
                        </a>

                        <!-- Sidebar -->
                        <div class="sidebar">
                            <!-- Sidebar Menu -->
                            <nav class="mt-2">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                                    <li class="nav-item">
                                        <a href="home.html" class="nav-link active">
                                        <i class="nav-icon fas fa-home"></i>
                                    <p>Home</p>
                                    </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="model/products.html" class="nav-link">
                                            <i class="fas fa-table nav-icon"></i>
                                            <p>Products</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="model/categories.html" class="nav-link">
                                            <i class="fas fa-table nav-icon"></i>
                                            <p>Categories</p>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <!-- /.sidebar-menu -->
                        </div>
                    <!-- /.sidebar -->
                    </aside>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
