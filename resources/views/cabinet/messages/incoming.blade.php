@extends('layouts.messages')

@section('incoming_tab_active', 'active-navbtn')

@section('messages_route')
    {{ route('show.incoming.messages') }}
@endsection


@section('add-script-head')
    {{--    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>--}}

    <style>

        .messages .container-fluid {
            background-color: transparent;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 0;
            padding-left: 0;
            padding-right: 0;
            box-sizing: border-box;
        }

        .messages .container-fluid div.row:hover {

            background-color: #fef6ea;
            cursor: pointer;

        }

        .messages .container-fluid .row {
            background-color: #ededed;


        }

        .messages .container-fluid .row {
            padding: 8px;
            border-top: 1px solid #ddd;
        }

        .messages .container-fluid .row img {
            border-radius: 4px;
        }

        .messages .container-fluid .row span {
            color: #0d5ac3;
            font-size: 13px;
            font-weight: 600;
        }

        .messages .container-fluid .row em {
            color: #0d5ac3;
            font-size: 11px;
            font-style: normal;
        }

        .messages .container-fluid .row p {
            font-size: 13px;
            font-weight: 400;
            margin: 1px 0px -1px 0px;
        }


        @media screen and (max-width: 991px) {
            .text-align {
                text-align: left;
            }

        }

        @media screen and (min-width: 992px) {
            .text-align {
                text-align: center;
            }

        }

    </style>
@endsection



@section('messages_table')
    <div class="messages">
        <div class="container-fluid">
            @foreach($messages as $message)
                <div class="row row-no-gutters">
                    <div @empty($message['read_at']) class="new" @endempty>

                        <div class="col-md-1 hidden-xs hidden-sm">
                            <img src="{{ asset(UploadImage::load('user', 42) . $message->sender->photo) }}" alt="">
                        </div>
                        <div class="col-md-9">
                            <span>
                            @isset($message->sender->name, $message->sender->surname)
                                    {{ $message->sender->surname }}, {{$message->sender->name}}
                                @else
                                    {{ $message->sender->login }}
                                @endisset
                            </span>
                            {{--                            <p>Открытый вопрос наоборот требует развёрнутого ответа. «Да» и «нет» — эти ответы...</p>--}}
                            {{--                            <p>{{ $message->text }}</p>--}}
                            {{--                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam cum possimus sed. Alias amet atque aut dolorum eaque eius exercitationem illo laboriosam non, nulla officiis quae quam quisquam suscipit voluptatem?</p>--}}
                        </div>
                        <div class="col-md-2 text-align">
                            <em>{{ $message->created_at }}</em>
                        </div>

                        <div class="col-md-11">
                            <p>{{ $message->text }}</p>
                        </div>


                    </div>

                </div>
            @endforeach

        </div>
    </div>
@endsection


{{--@section('messages_table')--}}
{{--    <table class="table">--}}
{{--        @foreach($messages as $message)--}}
{{--            <tr @empty($message['read_at']) class="new" @endempty>--}}
{{--                <td style="width: 60px"><img src="{{ asset(UploadImage::load('user', 42) . $user->photo) }}" alt=""></td>--}}
{{--                <td>--}}
{{--                    <span>--}}
{{--                        @isset($user->name, $user->surname)--}}
{{--                            {{ $user->surname }}, {{$user->name}}--}}
{{--                        @else--}}
{{--                            {{ $user->login }}--}}
{{--                        @endif--}}
{{--                    </span>--}}
{{--                    <p>Открытый вопрос наоборот требует развёрнутого ответа. «Да» и «нет» — эти ответы... Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem maxime nemo suscipit veritatis voluptate! Adipisci asperiores atque et eum expedita iure, molestiae neque nisi obcaecati pariatur perspiciatis qui, suscipit unde!</p>--}}
{{--                    <p>{{ $message->text }} </p>--}}
{{--                </td>--}}
{{--                <td style="width: 62px"><em>23.09.18</em></td>--}}

{{--            </tr>--}}
{{--        @endforeach--}}
{{--    </table>--}}
{{--@endsection--}}

{{--@section('main')--}}
{{--    <div class="row">--}}
{{--        <!--------------------- admin-profile----------->--}}
{{--        <h1>Сообщения <span>(1)</span></h1>--}}
{{--        <div id="products" class="col-lg-8 col-md-8 col-sm-8 col-xs-12 message">--}}
{{--            <div class="row block-top">--}}
{{--                <div class="nav-btn">--}}
{{--                    <a href="" class="active-navbtn">Входящие <span>1</span></a>--}}
{{--                    <a href="">Отправленные</a>--}}
{{--                </div>--}}
{{--                <table class="table">--}}
{{--                    <tr class="new" onclick="window.location.href='/message-in.html'; return false">--}}
{{--                        <td><img src="img/ava2.png" alt=""></td>--}}
{{--                        <td><span>Стейтем, Джейсон</span>--}}
{{--                            <p>Открытый вопрос наоборот требует развёрнутого ответа. «Да» и «нет» — эти ответы...</p>--}}
{{--                        </td>--}}
{{--                        <td><em>23.09.18</em></td>--}}
{{--                    </tr>--}}
{{--                    <tr onclick="window.location.href='/message-in.html'; return false">--}}
{{--                        <td><img src="img/ava2.png" alt=""></td>--}}
{{--                        <td><span>Стейтем, Джейсон</span>--}}
{{--                            <p>Открытый вопрос наоборот требует развёрнутого ответа. «Да» и «нет» — эти ответы...</p>--}}
{{--                        </td>--}}
{{--                        <td><em>23.09.18</em></td>--}}
{{--                    </tr>--}}
{{--                    <tr onclick="window.location.href='/message-in.html'; return false">--}}
{{--                        <td><img src="img/ava2.png" alt=""></td>--}}
{{--                        <td><span>Стейтем, Джейсон</span>--}}
{{--                            <p>Открытый вопрос наоборот требует развёрнутого ответа. «Да» и «нет» — эти ответы...</p>--}}
{{--                        </td>--}}
{{--                        <td><em>23.09.18</em></td>--}}
{{--                    </tr>--}}
{{--                    <tr onclick="window.location.href='/message-in.html'; return false">--}}
{{--                        <td><img src="img/ava2.png" alt=""></td>--}}
{{--                        <td><span>Стейтем, Джейсон</span>--}}
{{--                            <p>Открытый вопрос наоборот требует развёрнутого ответа. «Да» и «нет» — эти ответы...</p>--}}
{{--                        </td>--}}
{{--                        <td><em>23.09.18</em></td>--}}
{{--                    </tr>--}}
{{--                    <tr onclick="window.location.href='/message-in.html'; return false">--}}
{{--                        <td><img src="img/ava2.png" alt=""></td>--}}
{{--                        <td><span>Стейтем, Джейсон</span>--}}
{{--                            <p>Открытый вопрос наоборот требует развёрнутого ответа. «Да» и «нет» — эти ответы...</p>--}}
{{--                        </td>--}}
{{--                        <td><em>23.09.18</em></td>--}}
{{--                    </tr>--}}
{{--                    <tr onclick="window.location.href='/message-in.html'; return false">--}}
{{--                        <td><img src="img/ava2.png" alt=""></td>--}}
{{--                        <td><span>Стейтем, Джейсон</span>--}}
{{--                            <p>Открытый вопрос наоборот требует развёрнутого ответа. «Да» и «нет» — эти ответы...</p>--}}
{{--                        </td>--}}
{{--                        <td><em>23.09.18</em></td>--}}
{{--                    </tr>--}}
{{--                    <tr onclick="window.location.href='/message-in.html'; return false">--}}
{{--                        <td><img src="img/ava2.png" alt=""></td>--}}
{{--                        <td><span>Стейтем, Джейсон</span>--}}
{{--                            <p>Открытый вопрос наоборот требует развёрнутого ответа. «Да» и «нет» — эти ответы...</p>--}}
{{--                        </td>--}}
{{--                        <td><em>23.09.18</em></td>--}}
{{--                    </tr>--}}
{{--                    <tr onclick="window.location.href='/message-in.html'; return false">--}}
{{--                        <td><img src="img/ava2.png" alt=""></td>--}}
{{--                        <td><span>Стейтем, Джейсон</span>--}}
{{--                            <p>Открытый вопрос наоборот требует развёрнутого ответа. «Да» и «нет» — эти ответы...</p>--}}
{{--                        </td>--}}
{{--                        <td><em>23.09.18</em></td>--}}
{{--                    </tr>--}}
{{--                    <tr onclick="window.location.href='/message-in.html'; return false">--}}
{{--                        <td><img src="img/ava2.png" alt=""></td>--}}
{{--                        <td><span>Стейтем, Джейсон</span>--}}
{{--                            <p>Открытый вопрос наоборот требует развёрнутого ответа. «Да» и «нет» — эти ответы...</p>--}}
{{--                        </td>--}}
{{--                        <td><em>23.09.18</em></td>--}}
{{--                    </tr>--}}
{{--                    <tr onclick="window.location.href='/message-in.html'; return false">--}}
{{--                        <td><img src="img/ava2.png" alt=""></td>--}}
{{--                        <td><span>Стейтем, Джейсон</span>--}}
{{--                            <p>Открытый вопрос наоборот требует развёрнутого ответа. «Да» и «нет» — эти ответы...</p>--}}
{{--                        </td>--}}
{{--                        <td><em>23.09.18</em></td>--}}
{{--                    </tr>--}}
{{--                </table>--}}
{{--                <nav class="navigation" aria-label="Page navigation col-md-7 col-sm-7 col-xs-12">--}}
{{--                    <ul class="pagination">--}}
{{--                        <li>--}}
{{--                            <a href="#" aria-label="Previous">--}}
{{--                                <span aria-hidden="true">&laquo;</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="active"><a href="#">1</a></li>--}}
{{--                        <li><a href="#">2</a></li>--}}
{{--                        <li><a href="#">3</a></li>--}}
{{--                        <li><a href="#">4</a></li>--}}
{{--                        <li>--}}
{{--                            <a href="#" aria-label="Next">--}}
{{--                                <span aria-hidden="true">&raquo;</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </nav>--}}
{{--                <div class="charge-by col-md-5 col-sm-5 col-xs-12 pull-right">--}}
{{--                    <span>Показывать по:</span>--}}
{{--                    <div class="btn-group">--}}
{{--                        <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">--}}
{{--                            10 <span class="caret"></span>--}}
{{--                        </button>--}}
{{--                        <ul class="dropdown-menu" role="menu" style="min-width: 0px ">--}}
{{--                            <li><a href="#">5</a></li>--}}
{{--                            <li class="active"><a href="#">10</a></li>--}}
{{--                            <li><a href="#">15</a></li>--}}
{{--                            <li><a href="#">20</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!---------------------- END admin-profile ----------->--}}
{{--        --}}{{--<div id="right-block" class="col-md-4 col-sm-4 hidden-xs">--}}
{{--            --}}{{--<h3>Меню управления</h3>--}}
{{--            --}}{{--<div class="menu-block menu-admin">--}}
{{--                --}}{{--<ul>--}}
{{--                    --}}{{--@include('snippets.cabinet_right_menu')--}}
{{--                --}}{{--</ul>--}}
{{--            --}}{{--</div>--}}
{{--        --}}{{--</div>--}}
{{--        @include('cabinet.menu.right')--}}

{{--    </div>--}}
{{--@endsection--}}

@section('additional_scripts')
    <script>

        $(document).ready(function () {


        });
    </script>
@endsection