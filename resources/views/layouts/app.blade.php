<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <title>Сервис поиска запчастей</title>

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"
          integrity="sha384-PmY9l28YgO4JwMKbTvgaS7XNZJ30MK9FAZjjzXtlqyZCqBY6X6bXIkM++IkyinN+" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- fontawesome -->
    <script src="https://use.fontawesome.com/3e648f924d.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"
            integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
            crossorigin="anonymous"></script>
    @yield('add-script-head')
</head>

<body>


<div id="header" class="container @yield('header-login') ">

    <div class="top row">
        <div class="logo col-md-3 col-sm-2 col-xs-9">
            <a href="/"><img src=" {{ asset('img/logo-header.png') }} "></a>
            <p class="hidden-sm">Сервис<br>поиска<br>запчастей</p>
        </div>
        <div class="menu-center col-md-6 col-sm-6 col-xs-12">
            <nav class="navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    <ul>
                        <li><a href="{{ route('search') }}">Поиск</a></li>
                        <li><a href="">Как все работает</a></li>
                        <li><a href="">Барахолка</a></li>
                        <li><a href="">Статьи</a></li>
                        <li class="hidden-sm hidden-lg hidden-md">
                            <a class="btn btn-default btn-outline btn-circle btn-cat" data-toggle="collapse"
                               href="#nav-collapse1" aria-expanded="false" aria-controls="nav-collapse1">Запросы по
                                категориям</a>
                        </li>
                    </ul>
                    <ul class="collapse nav navbar-nav nav-collapse hidden-block-menu" id="nav-collapse1"
                        style="height:0px;">
                        @yield('right_menu_xs')
                    </ul>
                    <div class="hidden-sm hidden-md hidden-lg registration-in-login">
                        @auth
                            <a href="{{ route('button.logout') }}" class="in-e17-bar"><i class="fa fa-sign-out" aria-hidden="true"></i> Выход</a>
                        @else
                            <a href="{{ route('register') }}" class="registration-bar">Регистрация</a>
                            <a href="{{ route('login') }}" class="in-e17-bar">Вход</a>
                        @endauth
                    </div>
                </div><!-- /.navbar-collapse -->
            </nav><!-- /.navbar -->
        </div>
        <div class="menu-right col-md-3 col-sm-3 hidden-xs">
            @auth
                <a href="{{ route('show.profile', ['user_id' => Auth::id()]) }}" class="registration">Личный кабинет</a>
                <a href="{{ route('button.logout')}}" class="in-e17"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
            @elseguest
                <a href="{{ route('register') }}" class="registration">Регистрация</a>
                <a href="{{ route('login') }}" class="in-e17">Вход</a>
            @endauth
        </div>
    </div>

    @yield('additional_header')

</div>


<div id="main" class="container @yield('main_add_class') ">
    @yield('main')
</div>


@yield('before_footer')
<div id="footer" class="container-fluid">
    <div class="container">
        <div class="col-md-3 col-sm-3">
            <div class="flogo">
                <img src="{{ asset('/img/logo-footer.png') }}">
            </div>
            <div class="cos">
                <i class="fa fa-facebook-official" aria-hidden="true"></i>
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </div>
            <div class="copywriting">
                <em>© Сервис поиска <br>запчастей</em>
            </div>
        </div>
        <div class="col-md-3 col-sm-3">
            <ul>
                <p>Страницы сайта</p>
                <li><a href="">Поиск</a></li>
                <li><a href="">Вопросы и ответы</a></li>
                <li><a href="">Статьи</a></li>
                <li><a href="">Барахолка</a></li>
                <li><a href="">Условия использования сайта</a></li>
                <li><a href="">Сотрудничество с нами</a></li>
            </ul>
        </div>
        <div class="col-md-3 col-sm-3">
            <ul>
                <p>Статьи и новости</p>
                <li><a href="">5 секретов на сайте</a></li>
                <li><a href="">Плановые работы на сайте</a></li>
                <li><a href="">Новые изменения на сайте</a></li>
                <li><a href="">5 секретов на сайте</a></li>
            </ul>
        </div>

        <div class="col-md-3 col-sm-3 right-f">
            <a href="" class="f-btn-in">Вход в систему</a>
            <a href="" class="f-btn-reg">Регистрация</a>
            <br>
            <em><a href="mailto:admin@mail.com">admin@mail.com</a></em>
        </div>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
        crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"
        integrity="sha384-vhJnz1OVIdLktyixHY4Uk3OHEwdQqPppqYR8+5mjsauETgLOcEynD9oPHhhz18Nw"
        crossorigin="anonymous"></script>
<script src="{{ asset('js/grid-list.js') }}"></script>

@yield('additional_scripts')

</body>
</html>
