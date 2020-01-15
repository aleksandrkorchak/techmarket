@extends('layouts.cabinet')

@section('message', 'active')

@section('add-script-head')
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection

@section('main')
    <div class="row">
        <!--------------------- admin-profile----------->
        <h1>Сообщения <span>(1)</span></h1>
        <div id="products" class="col-lg-8 col-md-8 col-sm-8 col-xs-12 message">
            <div class="row block-top">

                <div class="alert alert-danger my-5" style="padding-top: 20px; display: none">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>


                <div class="nav-btn">
                    <a href="{{ route('show.incoming.messages') }}" class="@yield('incoming_tab_active')">
                        Входящие{{--@if($count['user'] > 0)<span>{{ $count['user'] }}</span>@endif--}}</a>
                    <a href="{{ route('show.outgoing.messages') }}" class="@yield('outgoing_tab_active')">
                        Исходящие{{--@if($count['mention'] > 0)<span>{{ $count['mention'] }}</span>@endif--}}</a>
{{--                    <a href="" class="active-navbtn">Входящие <span>1</span></a>--}}
{{--                    <a href="">Отправленные</a>--}}
                </div>

                @yield('messages_table')


                <nav class="navigation" aria-label="Page navigation col-md-7 col-sm-7 col-xs-12">

{{--                    {{ $notifications->appends(['size' => $notifications->perPage()])->links() }}--}}
                    {{ $messages->appends(['size' => $messages->perPage()])->links() }}

                </nav>

{{--                <div class="charge-by col-md-5 col-sm-5 col-xs-12 pull-right">--}}
{{--                    <span>Показывать по:</span>--}}
{{--                    <div class="btn-group">--}}
{{--                        <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">--}}
{{--                            {{ $messages->perPage() }} <span class="caret"></span>--}}
{{--                        </button>--}}
{{--                        <ul class="dropdown-menu" role="menu" style="min-width: 0px ">--}}
{{--                            <li--}}
{{--                                    @if($messages->perPage() == 5)--}}
{{--                                    class="active"--}}
{{--                                    @endif>--}}
{{--                                <a href="@yield('messages_route')?size=5">5</a></li>--}}
{{--                            <li--}}
{{--                                    @if($messages->perPage() == 10)--}}
{{--                                    class="active"--}}
{{--                                    @endif>--}}
{{--                                <a href="@yield('messages_route')?size=10">10</a>--}}
{{--                            </li>--}}
{{--                            <li--}}
{{--                                    @if($messages->perPage() == 15)--}}
{{--                                    class="active"--}}
{{--                                    @endif>--}}
{{--                                <a href="@yield('messages_route')?size=15">15</a></li>--}}
{{--                            <li--}}
{{--                                    @if($messages->perPage() == 20)--}}
{{--                                    class="active"--}}
{{--                                    @endif>--}}
{{--                                <a href="@yield('messages_route')?size=20">20</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}


            </div>
        </div>
        <!---------------------- END admin-profile ----------->

        @include('cabinet.menu.right')

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