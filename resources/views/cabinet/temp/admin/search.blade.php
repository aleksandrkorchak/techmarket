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

@section('main_add_class', 'catalogs catalogs-zayawka admin-profile')

@section('main')
    <div class="row">
        <!--------------------- admin-profile----------->
        <h1>Проверка заявки</h1>
        <div id="products" class="col-lg-8 col-md-8 col-sm-8 col-xs-12 block-info-zayawka">
            <div class="row block-top">


                <p>Номер объявления: <span>{{ $search->id }}</span></p>
                <h1>Ищу {{ $spare_part }} для {{ $model_full_name }}</h1>
                <div class="img-content col-md-3 col-sm-4">
                    <img src="{{ asset('img/16.jpg') }}" alt="">
                </div>
                <div class="info-content col-md-9 col-sm-8">
                    <div class="col">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <p>Открыт: {{ $search_date }}</p>
                    </div>
                    <div class="col">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p>{{ $user_city }}</p>
                    </div>
                    <div class="col">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <p>{{ $views_count }} Просмотров обьявления</p>
                    </div>
                    <div class="col">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <p>Пользователь:
                            <a href="">{{ $user_full_name }}</a>
                        </p>
                    </div>
                </div>
                <div class="text-content col-xs-12">
                    <p>{{ $search_comment }}</p>
                </div>


                @empty($search->approve_at)
                    <div class="new-zayawka col-xs-12">
                        <div class="comment-meta">
                            <form action="{{ route('approve.search', ['id' => $search->id]) }}" method="post">
                                @csrf
                                <button type="submit" id="approve" class="btn-mi" role="button">
                                    Одобрить
                                </button>
                            </form>
                        </div>
                    </div>
                @endempty


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

        $('#approve').on('click', function () {

        });


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