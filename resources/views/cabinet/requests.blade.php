@extends('layouts.app')

@section('add-script-head')
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
        $('[data-toggle="collapse"]').on('click', function () {
            var $this = $(this),
                $parent = typeof $this.data('parent') !== 'undefined' ? $($this.data('parent')) : undefined;
            if ($parent === undefined) { /* Just toggle my  */
                $this.find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
                return true;
            }

            /* Open element will be close if parent !== undefined */
            var currentIcon = $this.find('.glyphicon');
            currentIcon.toggleClass('glyphicon-plus glyphicon-minus');
            $parent.find('.glyphicon').not(currentIcon).removeClass('glyphicon-minus').addClass('glyphicon-plus');

        });
    </script>
    <script>

        $('.newbtn').bind("click", function () {
            $('#pic').click();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

@section('header-login', 'header-login')

@section('request', 'active')

@section('right_menu')
    @include('snippets.cabinet_right_menu_mobile')
@endsection

{{--@section('menu_personal_xs')--}}
    {{--@include('snippets.menu_personal_cabinet_xs')--}}
{{--@endsection--}}

@section('main_add_class', 'catalogs catalogs-zayawka admin-profile')

@section('main')
    <div class="row">
        <!--------------------- admin-profile----------->
        <h1>Мои заявки на запчасти <span>(5)</span></h1>
        <div id="products" class="col-lg-8 col-md-8 col-sm-8 col-xs-12 profile-request">
            <div class="row block-top">

                <!--------------- my zayawki -------------------->

                <div class="item  col-xs-4 col-sm-6 col-md-4 grid-group-item list-group-item">
                    <div class="thumbnail col-xs-12">
                        <div class="img-list">
                            <a href="profile-request-zayawka.html"><img class="group list-group-image" src="img/16.jpg"
                                                                        alt=""></a>
                        </div>
                        <div class="caption">
                            <h4><a class="col-md-11 col-sm-10 col-xs-10 no-padding" href="profile-request-zayawka.html">Ищу
                                    Дисплейный модуль (Экран) для iphone 6</a><i
                                        onclick="window.location.href='/profile-request-zayawka.html'; return false"
                                        class="col-md-1 col-sm-2 col-xs-2 fa fa-pencil pull-right"
                                        aria-hidden="true"></i>
                            </h4>
                            <p class="col-xs-12 no-padding group inner list-group-item-text">Жду интересных
                                предложений</p>
                        </div>
                    </div>

                    <div class="col-xs-12 item-bottom-info">
                        <div class="col-md-4 col-sm-4 boot-in">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <p>Каменец-Подольский</p>
                        </div>
                        <div class="col-md-3 col-sm-3 boot-in">
                            <i class="fa fa-handshake-o" aria-hidden="true"></i>
                            <p>6 Предложений</p>
                        </div>
                        <div class="col-md-4 col-sm-4 boot-in">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <p>Открыт: 2 дней 26 минут назад</p>
                        </div>
                        <div class="dell col-md-1 col-sm-1 pull-right">
                            <a href="#dell">
                                <i class="fa fa-trash" aria-hidden="true"></i> <span
                                        class="hidden-lg hidden-md hidden-sm">Удалить</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item  col-xs-4 col-sm-6 col-md-4 grid-group-item list-group-item">
                    <div class="thumbnail col-xs-12">
                        <div class="img-list">
                            <a href="profile-request-zayawka.html"><img class="group list-group-image" src="img/16.jpg"
                                                                        alt=""></a>
                        </div>
                        <div class="caption">
                            <h4><a class="col-md-11 col-sm-10 col-xs-10 no-padding" href="profile-request-zayawka.html">Ищу
                                    Дисплейный модуль (Экран) для iphone 6</a><i
                                        onclick="window.location.href='/profile-request-zayawka.html'; return false"
                                        class="col-md-1 col-sm-2 col-xs-2 fa fa-pencil pull-right"
                                        aria-hidden="true"></i>
                            </h4>
                            <p class="col-xs-12 no-padding group inner list-group-item-text">Жду интересных
                                предложений</p>
                        </div>
                    </div>

                    <div class="col-xs-12 item-bottom-info">
                        <div class="col-md-4 col-sm-4 boot-in">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <p>Каменец-Подольский</p>
                        </div>
                        <div class="col-md-3 col-sm-3 boot-in">
                            <i class="fa fa-handshake-o" aria-hidden="true"></i>
                            <p>6 Предложений</p>
                        </div>
                        <div class="col-md-4 col-sm-4 boot-in">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <p>Открыт: 2 дней 26 минут назад</p>
                        </div>
                        <div class="dell col-md-1 col-sm-1 pull-right">
                            <a href="#dell">
                                <i class="fa fa-trash" aria-hidden="true"></i> <span
                                        class="hidden-lg hidden-md hidden-sm">Удалить</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item  col-xs-4 col-sm-6 col-md-4 grid-group-item list-group-item">
                    <div class="thumbnail col-xs-12">
                        <div class="img-list">
                            <a href="profile-request-zayawka.html"><img class="group list-group-image" src="img/16.jpg"
                                                                        alt=""></a>
                        </div>
                        <div class="caption">
                            <h4><a class="col-md-11 col-sm-10 col-xs-10 no-padding" href="profile-request-zayawka.html">Ищу
                                    Дисплейный модуль (Экран) для iphone 6</a><i
                                        onclick="window.location.href='/profile-request-zayawka.html'; return false"
                                        class="col-md-1 col-sm-2 col-xs-2 fa fa-pencil pull-right"
                                        aria-hidden="true"></i>
                            </h4>
                            <p class="col-xs-12 no-padding group inner list-group-item-text">Жду интересных
                                предложений</p>
                        </div>
                    </div>

                    <div class="col-xs-12 item-bottom-info">
                        <div class="col-md-4 col-sm-4 boot-in">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <p>Каменец-Подольский</p>
                        </div>
                        <div class="col-md-3 col-sm-3 boot-in">
                            <i class="fa fa-handshake-o" aria-hidden="true"></i>
                            <p>6 Предложений</p>
                        </div>
                        <div class="col-md-4 col-sm-4 boot-in">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <p>Открыт: 2 дней 26 минут назад</p>
                        </div>
                        <div class="dell col-md-1 col-sm-1 pull-right">
                            <a href="#dell">
                                <i class="fa fa-trash" aria-hidden="true"></i> <span
                                        class="hidden-lg hidden-md hidden-sm">Удалить</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item  col-xs-4 col-sm-6 col-md-4 grid-group-item list-group-item">
                    <div class="thumbnail col-xs-12">
                        <div class="img-list">
                            <a href="profile-request-zayawka.html"><img class="group list-group-image" src="img/16.jpg"
                                                                        alt=""></a>
                        </div>
                        <div class="caption">
                            <h4><a class="col-md-11 col-sm-10 col-xs-10 no-padding" href="profile-request-zayawka.html">Ищу
                                    Дисплейный модуль (Экран) для iphone 6</a><i
                                        onclick="window.location.href='/profile-request-zayawka.html'; return false"
                                        class="col-md-1 col-sm-2 col-xs-2 fa fa-pencil pull-right"
                                        aria-hidden="true"></i>
                            </h4>
                            <p class="col-xs-12 no-padding group inner list-group-item-text">Жду интересных
                                предложений</p>
                        </div>
                    </div>

                    <div class="col-xs-12 item-bottom-info">
                        <div class="col-md-4 col-sm-4 boot-in">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <p>Каменец-Подольский</p>
                        </div>
                        <div class="col-md-3 col-sm-3 boot-in">
                            <i class="fa fa-handshake-o" aria-hidden="true"></i>
                            <p>6 Предложений</p>
                        </div>
                        <div class="col-md-4 col-sm-4 boot-in">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <p>Открыт: 2 дней 26 минут назад</p>
                        </div>
                        <div class="dell col-md-1 col-sm-1 pull-right">
                            <a href="#dell">
                                <i class="fa fa-trash" aria-hidden="true"></i> <span
                                        class="hidden-lg hidden-md hidden-sm">Удалить</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item  col-xs-4 col-sm-6 col-md-4 grid-group-item list-group-item">
                    <div class="thumbnail col-xs-12">
                        <div class="img-list">
                            <a href="profile-request-zayawka.html"><img class="group list-group-image" src="img/16.jpg"
                                                                        alt=""></a>
                        </div>
                        <div class="caption">
                            <h4><a class="col-md-11 col-sm-10 col-xs-10 no-padding" href="profile-request-zayawka.html">Ищу
                                    Дисплейный модуль (Экран) для iphone 6</a><i
                                        onclick="window.location.href='/profile-request-zayawka.html'; return false"
                                        class="col-md-1 col-sm-2 col-xs-2 fa fa-pencil pull-right"
                                        aria-hidden="true"></i>
                            </h4>
                            <p class="col-xs-12 no-padding group inner list-group-item-text">Жду интересных
                                предложений</p>
                        </div>
                    </div>

                    <div class="col-xs-12 item-bottom-info">
                        <div class="col-md-4 col-sm-4 boot-in">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <p>Каменец-Подольский</p>
                        </div>
                        <div class="col-md-3 col-sm-3 boot-in">
                            <i class="fa fa-handshake-o" aria-hidden="true"></i>
                            <p>6 Предложений</p>
                        </div>
                        <div class="col-md-4 col-sm-4 boot-in">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <p>Открыт: 2 дней 26 минут назад</p>
                        </div>
                        <div class="dell col-md-1 col-sm-1 pull-right">
                            <a href="#dell">
                                <i class="fa fa-trash" aria-hidden="true"></i> <span
                                        class="hidden-lg hidden-md hidden-sm">Удалить</span>
                            </a>
                        </div>
                    </div>
                </div>


                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                            </a>
                        </li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">»</span>
                            </a>
                        </li>
                    </ul>
                </nav>


                <!-------- end my zayawki ------------------->

            </div>
        </div>
        <!---------------------- END admin-profile ----------->
        <div id="right-block" class="col-md-4 col-sm-4 hidden-xs">
            <h3>Меню управления</h3>
            <div class="menu-block menu-admin">
                <ul>
                    @include('snippets.cabinet_right_menu')
                </ul>
            </div>
        </div>

    </div>
@endsection


@section('additional_scripts')
    <script>

        $(document).ready(function () {
            $('.pass_show').append('<span class="ptxt"><i class="fa fa-eye" aria-hidden="true"></i></span>');
        });

        $(document).on('click', '.pass_show .ptxt', function () {

            $(this).prev().attr('type', function (index, attr) {
                return attr == 'password' ? 'text' : 'password';
            });

        });
    </script>
@endsection