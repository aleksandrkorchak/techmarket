@extends('layouts.cabinet')

@section('add-script-head')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

    <script>

        $(document).ready(function () {
            // Options
            var options = {
                max_value: 5,
                step_size: 0.1,
                initial_value: 0,
                selected_symbol_type: 'utf8_star', // Must be a key from symbols
                cursor: 'default',
                readonly: true,
                // change_once: false, // Determines if the rating can only be set once
                // ajax_method: 'POST',
                // url: 'http://localhost/test.php',
                // additional_data: {} // Additional data to send to the server
            };

            // var options3 = {
            //     selected_symbol_type: 'utf8_emoticons',
            //     max_value: 4,
            //     step_size: 1,
            //     convert_to_utf8: true,
            //     only_select_one_symbol: true,
            // };

            $(".rating").rate(options);
            // $(".rating").rate(options3);
            // $(".rating").rate("setValue");
        });

    </script>





    <style>

        .profile .mention h3 {
            text-transform: none;
            margin: 0px 0px 10px -15px;
            padding: 0px;
        }

        .mention .comment {
            margin: 0px -15px 0px -15px;
            margin-bottom: 0px;
            padding: 20px 20px 15px 20px;
            background-color: #f0f6fe;
            border-bottom: 3px solid #cedef3;
            margin-bottom: 20px;
            border-radius: 2px;
        }

        .mention .comment .ava {
            width: 42px;
            border-radius: 5px;
            float: left;
            margin-right: 20px;
        }

        .mention .com a {
            color: #0d5ac3;
            font-weight: 600;
        }

        .mention .com span {
            /*text-align: right;*/
            /*float: right;*/
            /*font-size: 11px;*/
        }


    </style>

@endsection



@section('main_add_class', 'catalogs catalogs-zayawka admin-profile')

@section('main')
    <div class="row">
        <!--------------------- admin-profile----------->
        <h1>Мой профиль</h1>
        <div id="products" class="col-lg-8 col-md-8 col-sm-8 col-xs-12 profile">

            <div class="row block-top">

                @yield('user-card')

                @if($errors->any())
                    <div class="" style="padding-top: 20px">
                        <div class="alert alert-danger my-5">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif


                <div class="profile-rating col-xs-12">
                    <div class="col">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <p>Зарегистрирован: <span>{{ $interval }}</span></p>
                    </div>
                    <div class="col">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        <p>Созданных заявок: <span>{{$user->searches->count()}} заявок</span></p>
                    </div>
                    @unless($user->role_id == 1)
                        <div class="col">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <p>Мой рейтинг:
                                <span>
                                    @if($user->seller->mention_count == 0)
                                        0
                                    @else
                                        {{ $user->seller->rating / $user->seller->mention_count }}
                                    @endif
                                </span>
                            </p>
                        </div>
                    @endunless
                </div>


                @unless($user->role_id == 1)
                    <div class="mention col-xs-12">
                        <h3>Все отзывы:</h3>
                        @isset($mentions)
                            @foreach($mentions as $key => $tree)
                                <div class="comment col-xs-12">
                                    @foreach($tree as $number => $mention)
                                        {{--                                    @foreach()--}}
                                        {{--                                    @php--}}
                                        {{--                                        dd($mention);--}}
                                        {{--                                    @endphp--}}
                                        @if($mention->sender_id != $user->id)

                                            <div class="ava" {{--style="overflow: hidden"--}}>

                                                <img src="{{ asset(UploadImage::load('user', 42) . $mention->sender->photo) }}"
                                                     alt="">

                                                {{--                                                <div class="rating" --}}{{--data-rate-value=6--}}{{--></div>--}}
                                            </div>



                                            {{--                                            <div class="rating"></div>--}}
                                            {{--                                            <span class="rating" style="float: left"  --}}{{--data-rate-value=4--}}{{--></span>--}}

                                            <div class="com">


                                                <a href="" class="name">
                                                    @isset($mention->sender->name, $mention->sender->surname)
                                                        {{ $mention->sender->name . ' ' . $mention->sender->surname }}
                                                    @else
                                                        {{ $mention->sender->login }}
                                                    @endisset

                                                </a>


                                                <span class="data hidden-xs"
                                                      style="float: right">{{ $mention->created_at }}</span>


                                                @if($number == 0)
                                                    <div {{--style="position: relative"--}} {{--style="overflow: hidden"--}} >
                                                        <label for=""
                                                               style="font-weight: normal; float: left/* font-size: 10px*/">Оценка: </label>
                                                        <div style="margin: 0; padding: 0; float: left; overflow: visible"
                                                             class="rating"
                                                             data-rate-value={{ $offers[$key]->rating }}></div>
                                                    </div>
                                                @endif

                                                <div style="clear: both">
                                                    <p>{{ $mention->text }}</p>
                                                </div>
                                                @endif
                                                @if($mention->sender_id == $user->id)
                                                    <div class="comment-meta-answer col-lg-11 col-lg-offset-1">
                                                        <div class="ava">
                                                            <img src="img/ava2.png" alt="">
                                                        </div>
                                                        <a href="" class="name">Суровцев Александр</a>
                                                        <span class="data hidden-xs">02.02.2019</span>
                                                        <p>Спасибо большое, очень приятно за такой отзыв. Рад что все
                                                            подошло!</p>
                                                    </div>
                                                @endif
                                                @if($mention->sender_id != $user->id)
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                        @endforeach
                    @endisset


                    <!---------------------- Сomment 1 ----------->
                    {{--                    <div class="comment col-xs-12">--}}
                    {{--                        <div class="ava">--}}
                    {{--                            <img src="img/ava3.png" alt="">--}}
                    {{--                        </div>--}}
                    {{--                        <div class="com">--}}
                    {{--                            <a href="" class="name">Джонни Дэп</a>--}}
                    {{--                            <span class="data hidden-xs">01.02.2019</span>--}}
                    {{--                            <p>Как редко в рекомендациях про отзывы говорят, что у отзыва тоже должна быть цель!--}}
                    {{--                                Спасибо, все понятно было что хотел купить и быстро оплатил. Моя оцена Александу 5.</p>--}}

                    {{--                            <div class="comment-meta-answer col-lg-11 col-lg-offset-1">--}}
                    {{--                                <div class="ava">--}}
                    {{--                                    <img src="img/ava2.png" alt="">--}}
                    {{--                                </div>--}}
                    {{--                                <a href="" class="name">Суровцев Александр</a>--}}
                    {{--                                <span class="data hidden-xs">02.02.2019</span>--}}
                    {{--                                <p>Спасибо большое, очень приятно за такой отзыв. Рад что все подошло!</p>--}}
                    {{--                            </div>--}}

                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <!----------------------END  Сomment 1 ----------->
                        <!---------------------- Сomment 2 ----------->
                    {{--                    <div class="comment col-xs-12">--}}
                    {{--                        <div class="ava">--}}
                    {{--                            <img src="img/ava.png" alt="">--}}
                    {{--                        </div>--}}
                    {{--                        <div class="com">--}}
                    {{--                            <a href="" class="name">Стейтем, Джейсон</a>--}}
                    {{--                            <span class="data hidden-xs">01.02.2019</span>--}}
                    {{--                            <p>Открытый вопрос наоборот требует развёрнутого ответа. «Да» и «нет» — эти ответы--}}
                    {{--                                подразумевает закрытый вопрос. Всё быстро оплачено и доставлено!</p>--}}

                    {{--                            <div class="comment-meta">--}}
                    {{--                                <a class="" role="button" data-toggle="collapse" href="#replyCommentT2"--}}
                    {{--                                   aria-expanded="false" aria-controls="collapseExample">Ответить <i class="fa fa-reply"--}}
                    {{--                                                                                                     aria-hidden="true"></i></a>--}}
                    {{--                                <div class="collapse" id="replyCommentT2">--}}
                    {{--                                    <form>--}}
                    {{--                                        <div class="form-group">--}}
                    {{--                                            <br>--}}
                    {{--                                            <label for="comment">Ваш коментарий</label>--}}
                    {{--                                            <textarea name="comment" class="form-control" rows="3"></textarea>--}}
                    {{--                                        </div>--}}
                    {{--                                        <button type="submit" class="btn-mi">Отправить</button>--}}
                    {{--                                    </form>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}

                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <!----------------------END  Сomment 2 ----------->

                    </div>
                @endunless
            </div>
        </div>
        <!---------------------- END admin-profile ----------->

        @include('cabinet.menu.right')

    </div>
@endsection

@section('additional_scripts')
    {{--    <script type="text/javascript" src="{{ asset('js/star/jquery.min.js') }}"></script>--}}
    {{--    --}}{{--    <script src="{{ asset('js/star/jquery.rateyo.min.css') }}" charset="utf-8"></script>--}}
    {{--    <script type="text/javascript" src="{{ asset('js/star/jquery.rateyo.js') }}"></script>--}}


    <script src="{{ asset('js/rater/rater.js') }}" charset="utf-8"></script>







    <script>

        // $(document).ready(function () {
        //     $('.pass_show').append('<span class="ptxt"><i class="fa fa-eye" aria-hidden="true"></i></span>');
        // });
        //
        // $(document).on('click', '.pass_show .ptxt', function () {
        //
        //     $(this).prev().attr('type', function (index, attr) {
        //         return attr == 'password' ? 'text' : 'password';
        //     });
        //
        // });
    </script>
@endsection