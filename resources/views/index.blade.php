@extends('layouts.app')

@section('right_menu')
    @include('snippets.requests_by_category')
@endsection

@section('additional_header')
    <div class="tittle row">
        <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12">
            <span>Быстрое решение вашей проблемы</span>
            <h1>Найти запчасти с нами быстро и выгодно!</h1>
            <h2>Сервис поиска запчастей</h2>
        </div>
    </div>
    <div class="input-zapros row">
        <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12">
            <i class="strelka fa fa-chevron-down" aria-hidden="true"></i>
            <select class="">
                <option>Выберите тип устройства</option>
                {{--@foreach($devices as $device)--}}
                {{--<option value="{{ $device }}">{{ $device }}</option>--}}
                {{--@endforeach--}}
            </select>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-8">
            <a href="" class="poisk-lg-btn">Начать поиск</a>
        </div>
    </div>

    <div class="how_it_works row">
        <h3>Как это работает?</h3>
        <div class="col-sm-3 col-xs-6">
            <div class="icon-block"><img src="img/Polygon-icon.png"><i>1</i></div>
            <div class="text-it">Отправьте<br>запрос на деталь</div>
        </div>
        <div class="col-sm-3 col-xs-6">
            <div class="icon-block"><img src="img/Polygon-icon.png"><i>2</i></div>
            <div class="text-it">Получайте предложения от продавцов с ценами</div>
        </div>
        <div class="col-sm-3 col-xs-6">
            <div class="icon-block"><img src="img/Polygon-icon.png"><i>3</i></div>
            <div class="text-it">Выберите наилучщее предложениеь</div>
        </div>
        <div class="col-sm-3 col-xs-6">
            <div class="icon-block"><img src="img/Polygon-icon.png"><i>4</i></div>
            <div class="text-it">Выбирайте лучщее предложение</div>
        </div>
    </div>
@endsection


@section('main')
    <div class="row">

        <div class="col-md-8 col-sm-8 col-xs-12">
            <h3 style="float:left">Последние запросы</h3>
            <div class="pull-right hidden-xs">
                <a href="#" id="list" class="btn btn-default btn-sm"><span
                            class="glyphicon glyphicon-th-list"></span></a>
                <a href="#" id="grid" class="btn btn-default btn-sm"><span
                            class="glyphicon glyphicon-th"></span></a>
            </div>
        </div>

        <!---------------------- Products ----------->
        <div id="products" class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

            <div class="item  col-xs-4 col-sm-6 col-md-4 grid-group-item list-group-item">
                <div class="thumbnail col-xs-12">
                    <div class="img-list">
                        <a href="catalog-zayawka.html"><img class="group list-group-image" src="img/12.jpg" alt=""/></a>
                    </div>
                    <div class="caption">
                        <h4><a href="catalog-zayawka.html">Ищу Дисплейный модуль (Экран) для iphone 6</a></h4>
                        <p class="group inner list-group-item-text">Жду интересных предложений</p>
                    </div>
                </div>

                <div class="col-xs-12  item-bottom-info ">
                    <div class="col-md-4 col-sm-4 boot-in">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p>Киев</p>
                    </div>
                    <div class="col-md-3 col-sm-4 boot-in">
                        <i class="fa fa-handshake-o" aria-hidden="true"></i>
                        <p>6 Предложений</p>
                    </div>
                    <div class="col-md-5 col-sm-4 boot-in">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <p>Открыт: 2 дней 26 минут назад</p>
                    </div>
                </div>
            </div>


            <div class="item  col-xs-4 col-sm-6 col-md-4 grid-group-item list-group-item">
                <div class="thumbnail col-xs-12">
                    <div class="img-list">
                        <a href="catalog-zayawka.html"><img class="group list-group-image" src="img/13.jpg" alt=""/></a>
                    </div>
                    <div class="caption">
                        <h4><a href="catalog-zayawka.html">Ищу Дисплейный модуль (Экран) для iphone 6</a></h4>
                        <p class="group inner list-group-item-text">Предлагаейте, буду звонить - забирать. Но не
                            очень
                            дорого) </p>
                    </div>
                </div>

                <div class="col-xs-12  item-bottom-info ">
                    <div class="col-md-4 col-sm-4 boot-in">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p>Каменец-Подольский</p>
                    </div>
                    <div class="col-md-3 col-sm-4 boot-in">
                        <i class="fa fa-handshake-o" aria-hidden="true"></i>
                        <p>6 Предложений</p>
                    </div>
                    <div class="col-md-5 col-sm-4 boot-in">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <p>Открыт: 2 дней 26 минут назад</p>
                    </div>
                </div>
            </div>


            <div class="item  col-xs-4 col-sm-6 col-md-4 grid-group-item list-group-item">
                <div class="thumbnail col-xs-12">
                    <div class="img-list">
                        <a href="catalog-zayawka.html"><img class="group list-group-image" src="img/14.jpg" alt=""/></a>
                    </div>
                    <div class="caption">
                        <h4><a href="catalog-zayawka.html">Ищу Дисплейный модуль (Экран) для iphone 6</a></h4>
                        <p class="group inner list-group-item-text">Предлагайте, буду брать. Надо быстро купить.
                            Заранее
                            всем спасибо!</p>
                    </div>
                </div>

                <div class="col-xs-12  item-bottom-info ">
                    <div class="col-md-4 col-sm-4 boot-in">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p>Каменец-Подольский</p>
                    </div>
                    <div class="col-md-3 col-sm-4 boot-in">
                        <i class="fa fa-handshake-o" aria-hidden="true"></i>
                        <p>6 Предложений</p>
                    </div>
                    <div class="col-md-5 col-sm-4 boot-in">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <p>Открыт: 2 дней 26 минут назад</p>
                    </div>
                </div>
            </div>

            <div class="item  col-xs-4 col-sm-6 col-md-4 grid-group-item list-group-item">
                <div class="thumbnail col-xs-12">
                    <div class="img-list">
                        <a href="catalog-zayawka.html"><img class="group list-group-image" src="img/15.jpg" alt=""/></a>
                    </div>
                    <div class="caption">
                        <h4><a href="catalog-zayawka.html">Ищу Дисплейный модуль (Экран) для iphone 6</a></h4>
                        <p class="group inner list-group-item-text">Жду интересных предложений</p>
                    </div>
                </div>

                <div class="col-xs-12  item-bottom-info ">
                    <div class="col-md-4 col-sm-4 boot-in">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p>Каменец-Подольский</p>
                    </div>
                    <div class="col-md-3 col-sm-4 boot-in">
                        <i class="fa fa-handshake-o" aria-hidden="true"></i>
                        <p>6 Предложений</p>
                    </div>
                    <div class="col-md-5 col-sm-4 boot-in">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <p>Открыт: 2 дней 26 минут назад</p>
                    </div>
                </div>
            </div>

            <div class="item  col-xs-4 col-sm-6 col-md-4 grid-group-item list-group-item">
                <div class="thumbnail col-xs-12">
                    <div class="img-list">
                        <a href="catalog-zayawka.html"><img class="group list-group-image" src="img/16.jpg" alt=""/></a>
                    </div>
                    <div class="caption">
                        <h4><a href="catalog-zayawka.html">Ищу Дисплейный модуль (Экран) для iphone 6</a></h4>
                        <p class="group inner list-group-item-text">Жду интересных предложений</p>
                    </div>
                </div>

                <div class="col-xs-12  item-bottom-info ">
                    <div class="col-md-4 col-sm-4 boot-in">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p>Каменец-Подольский</p>
                    </div>
                    <div class="col-md-3 col-sm-4 boot-in">
                        <i class="fa fa-handshake-o" aria-hidden="true"></i>
                        <p>6 Предложений</p>
                    </div>
                    <div class="col-md-5 col-sm-4 boot-in">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <p>Открыт: 2 дней 26 минут назад</p>
                    </div>
                </div>
            </div>

            <div class="item  col-xs-4 col-sm-6 col-md-4 grid-group-item list-group-item">
                <div class="thumbnail col-xs-12">
                    <div class="img-list">
                        <a href="catalog-zayawka.html"><img class="group list-group-image" src="img/12.jpg" alt=""/></a>
                    </div>
                    <div class="caption">
                        <h4><a href="catalog-zayawka.html">Ищу Дисплейный модуль (Экран) для iphone 6</a></h4>
                        <p class="group inner list-group-item-text">Жду интересных предложений</p>
                    </div>
                </div>

                <div class="col-xs-12  item-bottom-info ">
                    <div class="col-md-4 col-sm-4 boot-in">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p>Каменец-Подольский</p>
                    </div>
                    <div class="col-md-3 col-sm-4 boot-in">
                        <i class="fa fa-handshake-o" aria-hidden="true"></i>
                        <p>6 Предложений</p>
                    </div>
                    <div class="col-md-5 col-sm-4 boot-in">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <p>Открыт: 2 дней 26 минут назад</p>
                    </div>
                </div>
            </div>

            <div class="item  col-xs-4 col-sm-6 col-md-4 grid-group-item list-group-item">
                <div class="thumbnail col-xs-12">
                    <div class="img-list">
                        <a href="catalog-zayawka.html"><img class="group list-group-image" src="img/13.jpg" alt=""/></a>
                    </div>
                    <div class="caption">
                        <h4><a href="catalog-zayawka.html">Ищу Дисплейный модуль (Экран) для iphone 6</a></h4>
                        <p class="group inner list-group-item-text">Жду интересных предложений</p>
                    </div>
                </div>

                <div class="col-xs-12  item-bottom-info ">
                    <div class="col-md-4 col-sm-4 boot-in">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p>Каменец-Подольский</p>
                    </div>
                    <div class="col-md-3 col-sm-4 boot-in">
                        <i class="fa fa-handshake-o" aria-hidden="true"></i>
                        <p>6 Предложений</p>
                    </div>
                    <div class="col-md-5 col-sm-4 boot-in">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <p>Открыт: 2 дней 26 минут назад</p>
                    </div>
                </div>
            </div>

            <div class="item  col-xs-4 col-sm-6 col-md-4 grid-group-item list-group-item">
                <div class="thumbnail col-xs-12">
                    <div class="img-list">
                        <a href="catalog-zayawka.html"><img class="group list-group-image" src="img/14.jpg" alt=""/></a>
                    </div>
                    <div class="caption">
                        <h4><a href="catalog-zayawka.html">Ищу Дисплейный модуль (Экран) для iphone 6</a></h4>
                        <p class="group inner list-group-item-text">Жду интересных предложений</p>
                    </div>
                </div>

                <div class="col-xs-12  item-bottom-info ">
                    <div class="col-md-4 col-sm-4 boot-in">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p>Каменец-Подольский</p>
                    </div>
                    <div class="col-md-3 col-sm-4 boot-in">
                        <i class="fa fa-handshake-o" aria-hidden="true"></i>
                        <p>6 Предложений</p>
                    </div>
                    <div class="col-md-5 col-sm-4 boot-in">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <p>Открыт: 2 дней 26 минут назад</p>
                    </div>
                </div>
            </div>

            <div class="item  col-xs-4 col-sm-6 col-md-4 grid-group-item list-group-item">
                <div class="thumbnail col-xs-12">
                    <div class="img-list">
                        <a href="catalog-zayawka.html"><img class="group list-group-image" src="img/15.jpg" alt=""/></a>
                    </div>
                    <div class="caption">
                        <h4><a href="catalog-zayawka.html">Ищу Дисплейный модуль (Экран) для iphone 6</a></h4>
                        <p class="group inner list-group-item-text">Жду интересных предложений</p>
                    </div>
                </div>

                <div class="col-xs-12  item-bottom-info ">
                    <div class="col-md-4 col-sm-4 boot-in">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p>Каменец-Подольский</p>
                    </div>
                    <div class="col-md-3 col-sm-4 boot-in">
                        <i class="fa fa-handshake-o" aria-hidden="true"></i>
                        <p>6 Предложений</p>
                    </div>
                    <div class="col-md-5 col-sm-4 boot-in">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <p>Открыт: 2 дней 26 минут назад</p>
                    </div>
                </div>
            </div>

        </div>
        <!---------------------- END Products ----------->

        <div id="right-block" class="col-md-4 col-sm-4 hidden-xs">
            <h3>Запросы по категориям</h3>
            <div class="menu-block">
                <ul>
                    @yield('requests_by_category')
                </ul>
            </div>
            <br>
            <h3 style="float: left;">Статьи и новости</h3> <a href="" class="pull-right">Все</a>
            <br>
            <div class="news">
                <a href="#">
                    <div class="post">
                        <div class="img-post"><img src="img/post1.jpg"></div>
                        <div class="tiitle-post"><h4>Новые изменения на сайте</h4></div>
                        <div class="description-post"><p>Мы рады сообщить чтоб наш сайт стал еще удобнее и полезнее,
                                повились ряд новых функций</p></div>
                    </div>
                </a>
                <br>
                <a href="#">
                    <div class="post">
                        <div class="img-post"><img src="img/post2.jpg"></div>
                        <div class="tiitle-post"><h4>5 секретов на сайте</h4></div>
                        <div class="description-post"><p>Мы расскажем вам как выгодно приобрести запчасть на этом
                                сайте
                                и не пожалеть о покупке</p></div>
                    </div>
                </a>
                <br>
                <a href="#">
                    <div class="post">
                        <div class="img-post"><img src="img/post3.jpg"></div>
                        <div class="tiitle-post"><h4>Плановые работы на сайте</h4></div>
                        <div class="description-post"><p>Мы проведем плановые работы на сайте для улучщение
                                функционала</p></div>
                    </div>
                </a>
            </div>
        </div>

    </div>
@endsection