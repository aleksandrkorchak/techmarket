@extends('layouts.cabinet')

@section('notification', 'active')

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
                    $('#image').attr('src', e.target.result);
                    $('div i').removeClass('fa-picture-o');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection


@section('main')
    <div class="row">
        <!--------------------- admin-profile----------->
        <h1>Уведомления
            @if($count['total'] > 0)
                <span>(<span>{{ $count['total'] }}</span>)</span>
            @endif
        </h1>
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
                    <a href="{{ route('show.users.notifications') }}" class="@yield('users_tab_active')">
                        Пользователи@if($count['user'] > 0)<span>{{ $count['user'] }}</span>@endif</a>
                    <a href="{{ route('show.mentions.notifications') }}" class="@yield('mentions_tab_active')">
                        Отзывы@if($count['mention'] > 0)<span>{{ $count['mention'] }}</span>@endif</a>
                    <a href="{{ route('show.searches.notifications') }}" class="@yield('searches_tab_active')">
                        Заявки@if($count['search'] > 0)<span>{{ $count['search'] }}</span>@endif</a>
                    <a href="{{ route('show.offers.notifications') }}" class="@yield('offers_tab_active')">
                        Предложения@if($count['offer'] > 0)<span>{{ $count['offer'] }}</span>@endif</a>
                    <a href="{{ route('show.deals.notifications') }}" class="@yield('deals_tab_active')">
                        Сделки@if($count['deal'] > 0)<span>{{ $count['deal'] }}</span>@endif</a>
                </div>


                @yield('notification_table')


                <nav class="navigation" aria-label="Page navigation col-md-7 col-sm-7 col-xs-12">

                    {{ $notifications->appends(['size' => $notifications->perPage()])->links() }}

                </nav>

                <div class="charge-by col-md-5 col-sm-5 col-xs-12 pull-right">
                    <span>Показывать по:</span>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                            {{ $notifications->perPage() }} <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" style="min-width: 0px ">
                            <li
                                    @if($notifications->perPage() == 5)
                                    class="active"
                                    @endif>
                                <a href="@yield('notifications_route')?size=5">5</a></li>
                            <li
                                    @if($notifications->perPage() == 10)
                                    class="active"
                                    @endif>
                                <a href="@yield('notifications_route')?size=10">10</a>
                            </li>
                            <li
                                    @if($notifications->perPage() == 15)
                                    class="active"
                                    @endif>
                                <a href="@yield('notifications_route')?size=15">15</a></li>
                            <li
                                    @if($notifications->perPage() == 20)
                                    class="active"
                                    @endif>
                                <a href="@yield('notifications_route')?size=20">20</a></li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
        <!---------------------- END admin-profile ----------->

        @include('cabinet.menu.right')


        {{--Modal window--}}
        {{--        <div id="modalWindow" class="modal fade" tabindex="-1" role="dialog">--}}
        {{--            <div class="modal-dialog modal-sm">--}}
        {{--                <div class="modal-content">--}}
        {{--                    <div class="modal-header">--}}
        {{--                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
        {{--                        <h4 class="modal-title">Заголовок модального окна</h4>--}}
        {{--                    </div>--}}
        {{--                    <div class="modal-body">--}}
        {{--                        <input id="newValue" type="text" class="form-control">--}}
        {{--                    </div>--}}
        {{--                    <div class="modal-footer">--}}
        {{--                        <button id="btnModalSave" type="button" class="btn btn-primary">Сохранить</button>--}}
        {{--                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}


    </div>
@endsection



@section('additional_scripts')
    <script>

        $(function () {


            let rowTable = $('tr');


            rowTable.on('click', function () {
                if ($(this).hasClass('new')) {
                    let notification_id = $(this).children("td:first").text();
                    setReadNotification(notification_id);
                    $(this).removeClass('new');
                    notificationIndicators();
                }
            });


            rowTable.on('contextmenu', function () {

                let notification_id = $(this).children("td:first").text();


                deleteNotification(notification_id, this);
                // $(this).remove();
                return false;
            });


            function notificationIndicators() {

                let tab_number = $('div > a.active-navbtn > span');
                if (tab_number.text() > 1) {
                    tab_number.text(tab_number.text() - 1);
                } else {
                    tab_number.remove();
                }


                // console.log($('div.row > h1 > span').text());
                let caption_number = $('div.row > h1 > span > span');
                if (caption_number.text() > 1) {
                    caption_number.text(caption_number.text() - 1);
                } else {
                    $('div.row > h1 > span').remove();
                }

                // console.log($('li > a > i.fa-bell + span').text());
                let menu_number = $('li > a > i.fa-bell + span');
                menu_number.each(function () {
                    if ($(this).text() > 1) {
                        $(this).text($(this).text() - 1);
                    } else {
                        $(this).remove();
                    }
                });


            }

            function deleteNotification(notification_id, row) {
                console.log(notification_id);
                $.ajax({
                    url: '/ajax/notifications',
                    method: 'DELETE',
                    data: {
                        id: notification_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (result) {
                        // console.log(result);
                        // console.log(row);

                        if ($(row).hasClass('new')) {
                            notificationIndicators();
                        }

                        row.remove();

                    },
                    error: function (request, status, error) {
                        errorHandler(request, status, error);
                    }
                })
            }


            function setReadNotification(notification_id) {
                $.ajax({
                    url: '/ajax/notifications/read',
                    method: 'PUT',
                    data: {
                        id: notification_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (result) {
                        console.log(result);
                    },
                    error: function (request, status, error) {
                        errorHandler(request, status, error);
                    }
                })
            }


            function errorHandler(request, status, error) {
                let json = $.parseJSON(request.responseText);
                let err = $('.alert-danger');
                err.html('');
                err.show();
                $.each(json.errors, function (key, value) {
                    err.append('<p>' + value + '</p>');
                });
                err.delay(5000).fadeOut();
            }

        })

    </script>
@endsection