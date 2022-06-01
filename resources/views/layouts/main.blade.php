<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/core-img/favicon.ico')}}">

    <!-- Core Stylesheet -->

    <link rel="stylesheet" href="{{ asset('style.css')}}">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="nikki-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container-fluid">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="nikkiNav">

                        <!-- Nav brand -->
                        <a href="{{route('index')}}" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{ route('index') }}">Журнал</a></li>
                                    <li><a href="#">Курсы</a>
                                        <div class="megamenu">
                                            <ul class="single-mega  ">
                                                @foreach ($categories as $category)
                                                    <li><a href="#">- {{ $category['title'] }}</a></li>
                                                @endforeach





                                            </ul>
                                    </li>
                                    <li><a href="#">Категории</a>
                                        <div class="megamenu">
                                            <ul class="single-mega  ">
                                                @foreach ($categories as $category)
                                                    <li><a href="#">- {{ $category['title'] }}</a></li>
                                                @endforeach





                                            </ul>

                                        </div>
                                    </li>
                                    <li><a href="about-us.html">О проекте</a></li>
                                    <li><a href="{{route('chatbot')}}">"Нейронный Сократ"</a></li>

                                </ul>

                                <!-- Search Form -->
                                <div class="search-form">
                                    <form action="#" method="get">
                                        <input type="search" name="search" class="form-control" placeholder="Введите для поиска">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                                @guest
                                    <li><a href={{route('login')}}>Войти</a></li>
                                @else
                                    <li><a href={{route('logout')}}
                                            onclick = "event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        Выйти</a>
                                        <form id = "logout-form" action ="{{route('logout')}}" method = "POST" style = "display = none;">
                                        @csrf
                                    </li>
                                @endguest
{{--                                <!-- Social Button -->--}}
{{--                                <div class="top-social-info">--}}
{{--                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>--}}
{{--                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>--}}
{{--                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>--}}
{{--                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>--}}
{{--                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="RSS Feed"><i class="fa fa-rss" aria-hidden="true"></i></a>--}}
{{--                                </div>--}}

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
    <div id="root">
    @yield('content')
    </div>
    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Footer Social Info -->
                    <div class="footer-social-info d-flex align-items-center justify-content-between">
                        <a href="#"><i class="fa fa-facebook"></i><span>Facebook</span></a>
                        <a href="#"><i class="fa fa-twitter"></i><span>Twitter</span></a>
                        <a href="#"><i class="fa fa-google-plus"></i><span>Google +</span></a>
                        <a href="#"><i class="fa fa-linkedin"></i><span>linkedin</span></a>
                        <a href="#"><i class="fa fa-instagram"></i><span>Instagram</span></a>
                        <a href="#"><i class="fa fa-vimeo"></i><span>Vimeo</span></a>
                        <a href="#"><i class="fa fa-youtube"></i><span>Youtube</span></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="copywrite-text">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('js/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins js -->
    <script src="{{ asset('js/plugins/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{ asset('js/active.js')}}"></script>
</body>

</html>
