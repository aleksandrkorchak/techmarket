@extends('layouts.cabinet')

{{--@extends('layouts.app')--}}

@section('add-script-head')
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rating-input/0.4.0/bootstrap-rating-input.js"></script>

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
                    $('#image').attr('src', e.target.result);
                    $('div i').removeClass('fa-picture-o');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(document).ready(function () {
            $('.offer-collapse').on('click', function () {
                let parent = $(this);
                // console.log($(parent));
                if ($('.offer-msg', this).hasClass('offer-msg-wrapper')) {
                    $('.offer-msg', this).removeClass('offer-msg-wrapper');
                    $('.offer-image').hide();
                } else {
                    $('.offer-msg', this).removeClass('offer-msg-wrapper');
                    $('.offer-msg', this).addClass('offer-msg-wrapper');
                    $('.offer-image').show();
                }
            });

            $('.full_offer_btn').on('click', function ($e) {
                console.log($(this));
                $e.preventDefault();
                let parent = $(this).closest('.com');
                console.log(parent);
                if ($('.offer-msg', parent).hasClass('offer-msg-wrapper')) {
                    console.log($('.offer-msg', parent));
                    $('.offer-msg', parent).removeClass('offer-msg-wrapper');
                    $('.offer-image').hide();
                } else {
                    // $('.offer-msg', parent).removeClass('offer-msg-wrapper');
                    $('.offer-msg', parent).addClass('offer-msg-wrapper');
                    $('.offer-image').show();
                    console.log($('.offer-msg', parent));
                }
            });


            $('#sort-select').bind('change', function () {
                console.log(this);
                let url = $(this).val(); // get selected value
                if (url) { // require a URL
                    console.log(url);
                    window.location = url; // redirect
                }
                return false;
            });


            $('input.rating').rating({
                'min': 1,
                'max': 5,
                'empty-value': 0,
                'iconLib': 'glyphicon',
                'activeIcon': 'glyphicon-star',
                'inactiveIcon': 'glyphicon-star-empty',
                'clearable': false,
                'clearableIcon': 'glyphicon-remove',
                'inline': false,
                'readonly': false,
                'copyClasses': true
            });


        });


        // function windowSize() {
        //     if ($(window).width() < '768') {
        //         $('#date-block').detach().insertAfter('#date-header-block');
        //         $('#price-block').detach().insertAfter('#price-header-block');
        //         $('#state-block').detach().insertAfter('#state-header-block');
        //         $('#quality-block').detach().insertAfter('#quality-header-block');
        //     } else {
        //         $('#date-block').detach().insertAfter('#quality-header-block');
        //         $('#price-block').detach().insertAfter('#date-block');
        //         $('#state-block').detach().insertAfter('#price-block');
        //         $('#quality-block').detach().insertAfter('#state-block');
        //     }
        // }


        //


        function windowSize() {
            if ($(window).width() < '768') {
                $('.com').each(function () {
                    $('.date-block', this).detach().insertAfter($('.date-header-block', this));
                    $('.price-block', this).detach().insertAfter($('.price-header-block', this));
                    $('.state-block', this).detach().insertAfter($('.state-header-block', this));
                    $('.quality-block', this).detach().insertAfter($('.quality-header-block', this));
                    // if ($(this).find('.new_comment_link').length) {
                    //     $('.new_comment_link', this).detach().insertAfter($('.full_offer_btn', this));
                    // }

                });


                // if ($('.full_offer_btn').hasClass('pull-right')) {
                //     $('.full_offer_btn').removeClass('pull-right');
                // }

            } else {
                $('.com').each(function () {
                    $('.date-block', this).detach().insertAfter($('.quality-header-block', this));
                    $('.price-block', this).detach().insertAfter($('.date-block', this));
                    $('.state-block', this).detach().insertAfter($('.price-block', this));
                    $('.quality-block', this).detach().insertAfter($('.state-block', this));
                    // if ($(this).find('.new_comment_link').length) {
                    //     $('.full_offer_btn', this).detach().insertAfter($('.new_comment_link', this));
                    // }
                });

                // if (!$('.full_offer_btn').hasClass('pull-right')) {
                //     $('.full_offer_btn',).addClass('pull-right');
                // }

            }
        }

        $(function () {
            $(window).load(windowSize);
            $(window).resize(windowSize);
        });


        // function windowSize() {
        //     if ($(window).width() < '768') {
        //         $('.date-block').html('date-block');
        //         $('.price-block').html('price-block');
        //         $('.state-block').html('state-block');
        //         $('.quality-block').html('quality-block');
        //     }
        // }

        // $(function () {
        //     $('.com').click(function () {
        //         // $('.date-header-block', this).html('QU_QU');
        //         $('.date-block', this).html('qqqqqqqqqqqqq');
        //     })
        // })


        // jQuery plugin to prevent double click
        // jQuery.fn.preventDoubleClick = function() {
        //     $(this).on('click', function(e){
        //         var $el = $(this);
        //         if($el.data('clicked')){
        //             // Previously clicked, stop actions
        //             e.preventDefault();
        //             e.stopPropagation();
        //         }else{
        //             // Mark to ignore next click
        //             $el.data('clicked', true);
        //             // Unmark after 1 second
        //             window.setTimeout(function(){
        //                 $el.removeData('clicked');
        //             }, 1000)
        //         }
        //     });
        //     return this;
        // };


        // $(document).ready(function(){
        //     $("*").dblclick(function(e){
        //         e.preventDefault();
        //     });
        // });


    </script>

    <style>
        .offer {
            background-color: #fff;
            padding: 40px 0px 20px 0px;
            overflow: hidden;
        }

        .offer .upload-ava {
            padding-left: 0 !important;
        }

        .offer .upload-ava .newbtn {
            padding: 21px 19px;
            border-radius: 6px;
            font-size: 29px;
            color: #cecece;
            text-align: center;
            border: 2px dashed #cecece;
            cursor: pointer;
        }

        .offer .upload-ava .newbtn:hover {
            border: 2px dashed #0d5ac3;
            color: #0d5ac3;
        }

        .offer .upload-ava .newbtn p {
            font-size: 12px;
            color: #0d5ac3;
            padding-top: 10px;
            font-weight: 400;
            margin: 30px -15px -50px -15px;
        }


        /*.au-deal .au-msg-wrapper {*/
        /*display: inline-block;*/
        /*width: 100%;*/
        /*white-space: normal;*/
        /*vertical-align: top;*/
        /*overflow: hidden;*/
        /*cursor: default;*/
        /*word-wrap: break-word;*/
        /*-webkit-hyphens: auto;*/
        /*-moz-hyphens: auto;*/
        /*hyphens: auto;*/
        /*display: -webkit-box;*/
        /*-webkit-line-clamp: 2;*/
        /*-webkit-box-orient: vertical*/
        /*}*/


        .offer-msg {
            max-height: 30px;

            /*display: inline-block;*/
            /*width: 100%;*/
            /*white-space: normal;*/
            /*vertical-align: top;*/
            overflow: hidden;
            /*cursor: default;*/
            /*word-wrap: break-word;*/
            /*-webkit-hyphens: auto;*/
            /*-moz-hyphens: auto;*/
            /*hyphens: auto;*/
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical
        }

        .offer-msg-wrapper {
            max-height: initial;
            display: block
        }


        .offer-header {
            /*flex: 100%;*/
            /*position: relative;*/
            /*display: flex;*/
            /*margin: 20px 16px 18px;*/
            /*padding: 0;*/
            /*box-sizing: border-box;*/
            font-size: 10px;
            line-height: 1.4;
            font-family: roboto, sans-serif;
            color: #8c8c8c !important;

        }

        .offer-table .header {
            white-space: nowrap;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 10px;
            cursor: pointer;
            color: #8c8c8c !important;
            /*line-height: 1;*/
        }

        /*.deals-sort .active {*/
        /*font-weight: 600 !important;*/
        /*color: #000 !important;*/
        /*}*/

        .offer-table .price {
            flex: 0 0 75px;
        }


        .offer-table .date {
            flex: 0 0 60px;
        }

        .offer-table .state {
            flex: 0 0 89px;
        }

        .offer-table .quality {
            flex: 0 0 89px;
        }

        .no-left-indent {
            margin-left: 0 !important;
            padding-left: 0 !important;
        }

        .top-buffer-20px {
            margin-top: 20px;

        }

        .date-header-block {
            min-width: 30px;
            margin-left: 0 !important;
            padding-left: 0 !important;
        }

        .price-header-block {
            min-width: 55px;
            margin-left: 0 !important;
            padding-left: 0 !important;
        }

        .state-header-block {
            min-width: 70px;
            margin-left: 0 !important;
            padding-left: 0 !important;
        }

        .quality-header-block {
            min-width: 70px;
            margin-left: 0 !important;
            padding-left: 0 !important;
        }


        .breadcrumb:hover {
            background: #f0f0f0; /* Цвет фона */
            white-space: normal !important; /* Обычный перенос текста */
        }

        .com .comment-meta {
            margin-top: 5px;
        }

        .offer-image {
            margin-top: 10px;
        }


        .sortbox-title {
            margin: 0;
            padding: 0;
            line-height: 1.2;
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #222;
            font-weight: normal;
        }


        .sorting-in {
            /*display: inline;*/
            /*margin: 0;*/
            margin-left: -15px;
            margin-right: -15px;
            margin-bottom: 10px;

            padding: 0;
            /*display: inline-block;*/
            /*box-sizing: border-box;*/
            /*margin-block-start: 1em;*/
            /*margin-block-end: 1em;*/
            /*margin-inline-start: 0px;*/
            /*margin-inline-end: 0px;*/
            /*padding-inline-start: 40px;*/
        }

        .field {
            font-family: Arial, sans-serif;
            font-size: 14px;
            outline: 0;
            background-color: transparent;
            background-image: none;
            border-color: transparent;
            color: #3d7ee5;
            cursor: default;
            -webkit-appearance: none;
        }

        @media screen and (max-width: 767px) {
            .text-left-xs {
                text-align: left !important;
            }

        }

    </style>

@endsection



@section('main')
    <div class="row">
        <!--------------------- admin-profile----------->
        <ol class="breadcrumb col-lg-8 col-md-8 col-sm-8 col-xs-12"
            style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
            @yield('breadcrumb')
        </ol>
        <!--------------------- catalog-zayawka ----------->
        <div id="products" class="col-lg-8 col-md-8 col-sm-8 col-xs-12 block-info-zayawka">
            <div class="row block-top">
                <p>Номер объявления: <span>{{ $search->id }}</span></p>
                <h1>Ищу {{ \Str::lower($search->spare->name) }} для {{ $search->model->name }}</h1>
                <div class="img-content col-md-3 col-sm-4">
                    <img src="{{ asset('img/16.jpg') }}" alt="">
                </div>
                <div class="info-content col-md-9 col-sm-8">
                    <div class="col">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <p>Открыт: {{ $time_after_create_search }}</p>
                    </div>
                    <div class="col">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <p>Продавец:
                            <a href="">
                                @isset($search->user->name, $search->user->surname)
                                    {{ $search->user->name . ' ' . $search->user->surname . ' ' }}
                                @endisset
                                {{ '(' . $search->user->login . ')' }}
                            </a>
                        </p>
                    </div>
                    <div class="col">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p>{{ $search->user->city }}</p>
                    </div>
                    <div class="col">
                        <i class="fa fa-handshake-o" aria-hidden="true"></i>
                        <p>{{ $offers->count() }} Предложения <a href="#sentence">Смотреть</a></p>
                    </div>

                    <div class="col">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <p>{{ $views_count }} Просмотров обьявления</p>
                    </div>

                </div>
                @section('comment_for_search')
                    <div class="text-content col-xs-12">
                        <p>{{ $search->comment ?? 'Без комментария' }}</p>
                    </div>
                @show

                <div id="sentence" class="sentence col-xs-12">
                    <div class="sorting-in row">
                        <div class="col-xs-12 col-md-8 col-lg-9" {{--style="margin-left: -15px !important;"--}}>
                            <h3{{-- style="padding-left: -15px  !important;"--}}>Предложения:
                                @empty($offers->count())
                                    нет предложений
                                @else
                                    {{ $offers->count() }}
                                @endempty
                            </h3>
                        </div>

                        @if(Auth::id() === $search->user_id || Auth::user()->role_id === 3)
                            <div class="col-xs-12 col-md-4 col-lg-3{{--pull-right--}} sortbox"
                                 style="padding: 0; margin: 0;">
                                <label for="sort" class="sortbox-title">Сортировать по:</label>
                                <select class="field " id="sort-select" style="margin: auto">
                                    <option hidden disabled selected value> выбрать</option>
                                    <option id="price"
                                            value="{{ route('show.search.info.sort.offer', ['search_id' => $search->id ,'sort' => $next_sort_params['price']]) }}">
                                        цене
                                    </option>
                                    <option id="rating"
                                            value="{{--{{ route('show.search.info', ['sort' => $next_sort_params['rating']]) }}--}}">
                                        рейтингу
                                    </option>
                                </select>
                            </div>
                        @endif
                    </div>


                    <!---------------------- Offers ---------------------->
                    @foreach($offers as $offer)
                        <div class="comment">
                            <div class="ava">
                                <img src=" {{ asset(UploadImage::load('user') . $offer->user->photo) }}" alt="">
                            </div>
                            <div class="com">
                                <a href="" class="name">
                                    @isset($offer->user->name, $offer->user->surname)
                                        {{ $offer->user->name . ', ' . $offer->user->surname }}
                                    @else
                                        {{ $offer->user->login }}
                                    @endif
                                </a>

                                <div class="container-fluid">
                                    <div class="offer-header row">
                                        <div class="top-buffer-20px visible-xs"></div>

                                        <div id="date-header-block" class="date-header-block col-xs-2 col-sm-2">
                                            ДАТА:
                                        </div>
                                        <div id="price-header-block" class="price-header-block col-xs-2 col-sm-2">
                                            ЦЕНА,ГРН:
                                        </div>
                                        <div id="state-header-block" class="state-header-block col-xs-2  col-sm-3">
                                            СОСТОЯНИЕ:
                                        </div>
                                        <div id="quality-header-block" class="quality-header-block col-xs-2 col-sm-3">
                                            КАЧЕСТВО:
                                        </div>
                                        <div id="date-block" class="date-block  no-left-indent col-xs-10 col-sm-2">
                                            {{ $offer->created_at }}
                                        </div>
                                        <div id="price-block" class="price-block no-left-indent col-xs-10 col-sm-2">
                                            @if(Auth::id() === $offer->seller_id || Auth::id() === $search->user_id || Auth::user()->role_id === 3)
                                                {{ $offer->price }}
                                            @else
                                                ***
                                            @endif
                                        </div>
                                        <div id="state-block" class="state-block no-left-indent col-xs-10 col-sm-3">
                                            {{ $offer->state->name }}
                                        </div>
                                        <div id="quality-block" class="quality-block no-left-indent col-xs-10 col-sm-3">
                                            {{ $offer->quality->name }}
                                        </div>

                                    </div>
                                </div>

                                <div id="offer-collapse-{{ $loop->iteration}}" class="offer-collapse">
                                    <div class="offer-msg">
                                        <p> {{ $offer->comment }} </p>

                                        <div id="offer-image" class="offer-image">
                                            <img src="{{ UploadImage::load('offer') . $offer->photo }}" alt=""
                                                 class="img-rounded img-responsive">
                                        </div>

                                        @if(Auth::id() === $offer->seller_id || Auth::id() === $search->user_id || Auth::user()->role_id === 3)
                                            <div class="top-buffer-20px">
                                                Комментарии:
                                            </div>

                                            @isset($offer->messages)
                                                @foreach($offer->messages as $message)
                                                    @if($message->offer_id == $offer->id)
                                                        <div class="comment-meta-answer col-lg-11
                                            @if($message->sender_id != $offer->seller_id) col-lg-offset-1 @endif
                                                                " style="margin-top: 15px">
                                                            <div class="ava">
                                                                <img src="{{ UploadImage::load('user') . $message->sender->photo }}"
                                                                     alt="">
                                                            </div>
                                                            <a href="" class="name">
                                                                @isset($message->sender->name, $message->sender->surname)
                                                                    {{ $message->sender->name . ' ' . $message->sender->surname }}
                                                                @else
                                                                    {{ $message->sender->login }}
                                                                @endisset
                                                            </a>
                                                            <span class="data hidden-xs">{{ $message->created_at }}</span>
                                                            <p>{{ $message->text }}</p>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endisset
                                        @endif

                                    </div>
                                </div>


                                {{--                                @foreach($messages as $message)--}}
                                {{--                                    @if($message->offer_id == $offer->id)--}}
                                {{--                                        <div class="comment-meta-answer col-lg-11--}}
                                {{--                                            @if($message->user_id != $offer->seller_id) col-lg-offset-1 @endif--}}
                                {{--                                                " style="margin-top: 15px">--}}
                                {{--                                            <div class="ava">--}}
                                {{--                                                <img src="{{ UploadImage::load('user') . $message->user->photo }}"--}}
                                {{--                                                     alt="">--}}
                                {{--                                            </div>--}}
                                {{--                                            <a href="" class="name">--}}
                                {{--                                                @isset($message->user->name, $message->user->surname)--}}
                                {{--                                                    {{ $message->user->name . ' ' . $message->user->surname }}--}}
                                {{--                                                @else--}}
                                {{--                                                    {{ $message->user->login }}--}}
                                {{--                                                @endisset--}}
                                {{--                                            </a>--}}
                                {{--                                            <span class="data hidden-xs">{{ $message->created_at }}</span>--}}
                                {{--                                            <p>{{ $message->text }}</p>--}}
                                {{--                                        </div>--}}
                                {{--                                    @endif--}}
                                {{--                                @endforeach--}}


                                {{--                                <div class="comment-meta clearfix">--}}
                                {{--                                    @if(Auth::id() === $offer->seller_id || Auth::id() === $search->user_id || Auth::user()->role_id === 3)--}}
                                {{--                                        <a class="new_comment_link" role="button" data-toggle="collapse"--}}
                                {{--                                           href="#replyComment{{ $loop->iteration }}"--}}
                                {{--                                           aria-expanded="false" aria-controls="collapseExample">--}}
                                {{--                                            Ответить--}}
                                {{--                                            <i class="fa fa-reply" aria-hidden="true"></i>--}}
                                {{--                                        </a>--}}
                                {{--                                    @endif--}}

                                {{--                                    @if(Auth::id() === $search->user_id)--}}
                                {{--                                        <a class="accept_offer_link" role="button" href="#--}}{{--replyComment{{ $loop->iteration }}--}}{{--">--}}
                                {{--                                            Принять--}}
                                {{--                                            <i class="fa fa-handshake-o" aria-hidden="true"></i>--}}
                                {{--                                        </a>--}}
                                {{--                                    @endif--}}

                                {{--                                    <a class="--}}{{--pull-right--}}{{-- full_offer_btn" href="#">--}}
                                {{--                                        полностью--}}
                                {{--                                        @if(Auth::id() === $offer->seller_id || Auth::id() === $search->user_id || Auth::user()->role_id === 3)--}}
                                {{--                                            ({{ $offer->messages->count() }})--}}
                                {{--                                        @endif--}}
                                {{--                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>--}}
                                {{--                                    </a>--}}

                                {{--                                    <div class="collapse" id="replyComment{{ $loop->iteration }}">--}}
                                {{--                                        <form method="post"--}}
                                {{--                                              action="{{ route('add.message', ['id' => $offer->id]) }}">--}}
                                {{--                                            @csrf--}}
                                {{--                                            <div class="form-group">--}}
                                {{--                                                <br>--}}
                                {{--                                                <label for="comment">Ваш коментарий</label>--}}
                                {{--                                                <textarea name="comment" class="form-control" rows="3"></textarea>--}}
                                {{--                                            </div>--}}
                                {{--                                            <button type="submit" class="btn-mi">Отправить</button>--}}
                                {{--                                        </form>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}


                                <div class="comment-meta">
                                    {{--                                    <div class="container-fluid">--}}
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-4 col-sm-push-8  text-left-xs text-right">
                                            <a class="pull-right full_offer_btn" href="#">
                                                Развернуть
                                                @if(Auth::id() === $offer->seller_id || Auth::id() === $search->user_id || Auth::user()->role_id === 3)
                                                    ({{ $offer->messages->count() }})
                                                @endif
                                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                            </a>
                                        </div>


                                        {{--                                        <div class="col-xs-12 col-sm-4 col-sm-push-8  text-left-xs text-right">--}}
                                        {{--                                            <a class="full_offer_btn" role="button" data-toggle="collapse"--}}
                                        {{--                                               href="#offer-collapse-{{ $loop->iteration }}"--}}
                                        {{--                                               aria-expanded="false" aria-controls="offer-collapse-{{ $loop->iteration }}">--}}
                                        {{--                                                Развернуть--}}
                                        {{--                                                @if(Auth::id() === $offer->seller_id || Auth::id() === $search->user_id || Auth::user()->role_id === 3)--}}
                                        {{--                                                    ({{ $offer->messages->count() }})--}}
                                        {{--                                                @endif--}}
                                        {{--                                                <i class="fa fa-chevron-down" aria-hidden="true"></i>--}}
                                        {{--                                            </a>--}}
                                        {{--                                        </div>--}}


                                        <div class="col-xs-12 col-sm-4 text-left-xs text-center">
                                            @if(Auth::id() === $search->user_id && empty($search->offer_id_accepted))
                                                <a class="accept_offer_link" role="button"
                                                   href="{{ route('accept.offer', ['search_id' => $search->id,
                                                                                        'offer_id' => $offer->id]) }}">
                                                    Принять
                                                    <i class="fa fa-handshake-o" aria-hidden="true"></i>
                                                </a>
                                            @endif
                                            @isset($search->offer_id_accepted)
                                                @if($offer->id === $search->offer_id_accepted)
                                                    ПРЕДЛОЖЕНИЕ ПРИНЯТО

                                                    @empty($offer->mention_id)
                                                        <a data-toggle="modal"
                                                           href="#add-mention-{{ $loop->iteration }}" {{--class="btn btn-primary btn-lg"--}}>Оставить
                                                            отзыв</a>

                                                        {{--                                                    <a role="button" data-toggle="collapse"--}}
                                                        {{--                                                       href="#add-mention-{{ $loop->iteration }}"--}}
                                                        {{--                                                       aria-expanded="true"--}}
                                                        {{--                                                       aria-controls="add-mention-{{ $loop->iteration }}">--}}
                                                        {{--                                                        Оставить отзыв--}}
                                                        {{--                                                    </a>--}}

                                                        {{--                                                    <div class="collapse" id="add-mention-{{ $loop->iteration }}">--}}
                                                        {{--                                                        <form method="post"--}}
                                                        {{--                                                              action="{{ route('add.mention', ['id' => $offer->id]) }}">--}}
                                                        {{--                                                            @csrf--}}
                                                        {{--                                                            <div class="form-group">--}}
                                                        {{--                                                                <label for="rating">Оценить: </label>--}}
                                                        {{--                                                                <input type="number" name="rating" class="rating"--}}
                                                        {{--                                                                       id="rating"--}}
                                                        {{--                                                                       data-clearable="remove"/>--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                            <div class="form-group">--}}
                                                        {{--                                                                <br>--}}
                                                        {{--                                                                <label for="comment">Ваш отзыв</label>--}}
                                                        {{--                                                                <textarea name="comment" id="comment"--}}
                                                        {{--                                                                          class="form-control"--}}
                                                        {{--                                                                          rows="3"></textarea>--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                            <button type="submit" class="btn-mi">Отправить</button>--}}
                                                        {{--                                                        </form>--}}
                                                        {{--                                                    </div>--}}



                                                    <!-- Modal -->
                                                        <div class="modal fade" id="add-mention-{{ $loop->iteration }}"
                                                             tabindex="-1"
                                                             role="dialog" aria-labelledby="myModalLabel"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-hidden="true">&times;
                                                                        </button>
                                                                        <h4 class="modal-title">Оставить отзыв</h4>
                                                                    </div>
                                                                    <form method="post"
                                                                          action="{{ route('add.mention', ['id' => $offer->id]) }}">
                                                                        <div class="modal-body">

                                                                            <div {{--id="add-mention-{{ $loop->iteration }}"--}}>


                                                                                @csrf
                                                                                <div class="form-group">
                                                                                    <label for="rating">Оценить: </label>
                                                                                    <input type="number" name="rating"
                                                                                           class="rating"
                                                                                           id="rating"
                                                                                           data-clearable="remove"/>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <br>
                                                                                    <label for="comment">Комментарий</label>
                                                                                    <textarea name="comment"
                                                                                              id="comment"
                                                                                              class="form-control"
                                                                                              rows="3"></textarea>
                                                                                </div>
                                                                                {{--                                                                <button type="submit" class="btn-mi">Отправить</button>--}}

                                                                            </div>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit"
                                                                                    class="btn btn-primary">Отправить
                                                                            </button>
                                                                            <button type="button"
                                                                                    class="btn btn-default"
                                                                                    data-dismiss="modal">Закрыть
                                                                            </button>

                                                                        </div>
                                                                    </form>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->
                                                    @else
                                                        Отзыв оставлен
                                                    @endempty
                                                @endif
                                            @endisset
                                        </div>


                                        <div class="col-xs-12 col-sm-4 col-sm-pull-8">
                                            @if(Auth::id() === $offer->seller_id || Auth::id() === $search->user_id || Auth::user()->role_id === 3)
                                                <a class="new_comment_link" role="button" data-toggle="collapse"
                                                   href="#replyComment{{ $loop->iteration }}"
                                                   aria-expanded="true"
                                                   aria-controls="replyComment{{ $loop->iteration }}">
                                                    Ответить
                                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                                </a>
                                            @endif
                                        </div>

                                    </div>


                                    <div class="collapse" id="replyComment{{ $loop->iteration }}">
                                        <form method="post"
                                              action="{{ route('add.message', ['id' => $offer->id]) }}">
                                            @csrf
                                            <div class="form-group">
                                                <br>
                                                <label for="comment">Ваш коментарий</label>
                                                <textarea name="comment" class="form-control" rows="3"></textarea>
                                            </div>
                                            <button type="submit" class="btn-mi">Отправить</button>
                                        </form>
                                    </div>
                                </div>


                            </div>
                        </div>
                    @endforeach


                </div>

                {{--            The user is owner of search or he has already made an offer--}}
                @unless(Auth::user()->id === $search->user->id ||
                        Auth::user()->offers()->where('search_id', $search->id)->count() > 0 ||
                        isset($search->offer_id_accepted))
                    <div class="new-zayawka col-xs-12">
                        <div class="comment-meta">
                            <button class="btn-mi" role="button" data-toggle="collapse" href="#new-zayawka"
                                    aria-expanded="false" aria-controls="collapseExample">+ Добавить предложение
                            </button>


                            <div class="collapse" id="new-zayawka">
                                <hr>
                                <h2 class="text-center">Ваше предложение</h2>
                                <form method="post" action="{{ route('add.offer', ['id' => $search->id]) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="search_id" value="{{ $search->id }}">
                                    <div class="offer">
                                        <div class="upload-ava col-sm-5">
                                            <label class=newbtn>

                                                <div class="img-label-not">
                                                    <i class="fa fa-picture-o" aria-hidden="true">
                                                        <img id="image" src="#" alt="" class="img-responsive"/></i>
                                                </div>

                                                <input style="display: none;" id="pic" class='pis' name="photo"
                                                       onchange="readURL(this);"
                                                       type="file">
                                                <p>Добавить фото</p>
                                            </label>
                                        </div>

                                        <div class="info-profile col-sm-7">

                                            <div class="form-group row">
                                                <label for="state"
                                                       class="col-lg-3 col-sm-4 col-form-label text-md-right">Состояние:</label>
                                                <div class="col-lg-9 col-sm-8">
                                                    <select name="state_id" id="state">
                                                        @foreach($states as $state)
                                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="quality"
                                                       class="col-lg-3 col-sm-4 col-form-label text-md-right">Качество:</label>
                                                <div class="col-lg-9 col-sm-8">
                                                    <select name="quality_id" id="quality">
                                                        @foreach($qualities as $quality)
                                                            <option value="{{ $quality->id }}">{{ $quality->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="price"
                                                       class="col-lg-3 col-sm-4 col-form-label text-md-right">Цена,
                                                    грн:</label>
                                                <div class="col-lg-9 col-sm-8">
                                                    <input type="text" name="price" value=""
                                                           placeholder="Ваша цена">

                                                </div>
                                            </div>

                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <br>
                                        <label for="comment">Комментарий:</label>
                                        <textarea name="comment" class="form-control" rows="3"></textarea>
                                    </div>

                                    <button type="submit" class="btn-mi">Отправить</button>

                                </form>
                            </div>


                        </div>
                    </div>
                @endunless


            </div>
        </div>


        <!---------------------- END admin-profile ----------->

        @include('cabinet.menu.right')

    </div>
@endsection





@section('additional_scripts')
    {{--<script>--}}

    {{--$('#approve').on('click', function () {--}}

    {{--});--}}


    {{--$(document).ready(function () {--}}
    {{--$('.pass_show').append('<span class="ptxt"><i class="fa fa-eye" aria-hidden="true"></i></span>');--}}
    {{--});--}}

    {{--$(document).on('click', '.pass_show .ptxt', function () {--}}

    {{--$(this).prev().attr('type', function (index, attr) {--}}
    {{--return attr == 'password' ? 'text' : 'password';--}}
    {{--});--}}

    {{--});--}}
    {{--</script>--}}
@endsection