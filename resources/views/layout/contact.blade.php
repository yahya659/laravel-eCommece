<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Online store</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/img/ooogo.jpg')}}">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <!-- mean menu css -->
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}">
    <!-- main style -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

</head>
<style>
    .subtitle {
        letter-spacing: 0px !important;

    }
</style>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" style="position: relative; background-color: black;" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="/">
                                <img src="{{asset('assets/img/logo.png')}}" alt="" >
                                {{-- <h1 style="color: wheat">E_Commece</h1> --}}
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu" dir="rtl">
                            <ul>
                                <li class="current-list-item"><a href="/">الرئيسيه</a>
                                </li>
                                <li><a href="{{ route('pro') }}">المنتجات</a></li>
                                <li><a href="{{ route('cat') }}">الااقسام</a></li>
                                <li><a href="/about">من نحن</a></li>
                                @auth
                                    @if (auth()->user()->email==='aal@gmail.com')
                                    <li><a href="/addproduct">اضافه منتج</a>
                                    <li><a href="/productTable">جدول المنتجات</a>

                                    @endif
                                @endauth

                                <li><a href="/Review">اراء العملاء</a>





                                        @guest
                            @if (Route::has('login'))
                                <li>
                                    <a href="{{ route('login') }}">تسجيل دخول</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li>
                                    <a  href="{{ route('register') }}">مستخدم جديد</a>
                                </li>
                            @endif
                        @else
                            <li>
                                <a href="#">
                                    {{ Auth::user()->name }}
                                </a>
                                </li>
                                <li>


                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        تسجيل خروج
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>


                        @endguest





                                </li>

                                <li>
                                    <div class="header-icons">
                                        <a class="shopping-cart" href="/cart"><i
                                                class="fas fa-shopping-cart"></i></a>
                                        <a class="mobile-hide search-bar-icon" href="/search"><i
                                                class="fas fa-search"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>البحث على جميع المنتجات الخاصه بنا :</h3>
                            <form action="/search" method="POST">
                                @csrf
                            <input type="text" name="name" placeholder="ابحث عن المنتجات" >
                            <button type="submit">بحث <i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->

    <!-- home page slider -->
    {{-- <div style="height: 50px;"></div> --}}

    @yield('contact')
    {{-- foooter --}}

    <!-- end footer -->

    <!-- copyright -->

    <!-- end copyright -->

    <!-- jquery -->
    <script src="{{asset('assets/js/jquery-1.11.3.min.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- count down -->
    <script src="{{asset('assets/js/jquery.countdown.js')}}"></script>
    <!-- isotope -->
    <script src="{{asset('assets/js/jquery.isotope-3.0.6.min.js')}}"></script>
    <!-- waypoints -->
    <script src="{{asset('assets/js/waypoints.js')}}"></script>
    <!-- owl carousel -->
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <!-- magnific popup -->
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- mean menu -->
    <script src="{{asset('assets/js/jquery.meanmenu.min.js')}}"></script>
    <!-- sticker js -->
    <script src="{{asset('assets/js/sticker.js')}}"></script>
    <!-- main js -->
    <script src="{{asset('assets/js/main.js')}}"></script>
