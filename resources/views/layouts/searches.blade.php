@extends('layouts.cabinet')

@section('add-script-head')
    <script src="//code.jquery.com/jquery-1.11.1.min.js" xmlns="http://www.w3.org/1999/html"></script>
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


        $(function () {

            $(".link").bind("click", function (e) {
                e.preventDefault();
            });


            $('form').bind('click', function () {
                $(this).submit();
            });

            // $('h4 i').bind('click', function () {
            //
            // })

        })

    </script>
    <style>
        .vertical-align {
            display: flex;
            /*flex-direction: row;*/
            justify-content: center;
            /*align-items: center;*/
        }
    </style>
@endsection


@section('main')
    <div class="row">
        <!--------------------- admin-profile----------->
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h1 style="float:left"> @yield('caption') <span>({{ $searches->total() }})</span></h1>
            <div class="pull-right hidden-xs">
                <a href="#" id="list" class="btn btn-default btn-sm"><span
                            class="glyphicon glyphicon-th-list"></span></a>
                <a href="#" id="grid" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th"></span></a>
            </div>
        </div>


        <div id="products" class="col-lg-8 col-md-8 col-sm-8 col-xs-12 profile-request">
            <div class="row block-top">

                <!--------------- my zayawki -------------------->

                @foreach($searches as $search)
                    <div class="item  col-xs-4 col-sm-6 col-md-4 grid-group-item list-group-item">
                        <div class="thumbnail col-xs-12">
                            <div class="img-list">
                                <a href="{{ route('show.search.info', ['search_id' => $search->id]) }}">
                                    <img class="group list-group-image" src="{{ asset('img/16.jpg') }}" alt=""></a>
                            </div>
                            <div class="caption">
                                <h4><a class="col-md-11 col-sm-10 col-xs-10 no-padding"
                                       href="{{ route('show.search.info', ['id' => $search->id]) }}">
                                        Ищу {{ \Str::lower($search->spare->name) }} для {{ $search->model->name }}
                                    </a>
                                    @if(\Illuminate\Support\Facades\Auth::user()->role_id === 3 ||
                                        \Illuminate\Support\Facades\Auth::user()->id === $search->user_id)
                                        <a href="{{ route('show.edit.search', ['search_id' => $search->id]) }}">
                                            <i
                                                    {{--onclick="window.location.href=''; return false"--}}
                                                    {{--onclick="window.location.href='/profile-request-zayawka.html'; return false"--}}
                                                    class="col-md-1 col-sm-2 col-xs-2 fa fa-pencil pull-right"
                                                    aria-hidden="true">
                                            </i>
                                        </a>
                                    @endif
                                </h4>
                                <p class="col-xs-12 no-padding group inner list-group-item-text">
                                    {{ $search->comment }}
                                </p>
                            </div>
                        </div>

                        <div class="col-xs-12 item-bottom-info">
                            <div class="col-md-4 col-sm-4 boot-in">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <p>{{ $search->user->city }}</p>
                            </div>
                            <div class="col-md-3 col-sm-3 boot-in">
                                <i class="fa fa-handshake-o" aria-hidden="true"></i>
                                <p>{{ $search->offers->count() }} Предложений</p>
                            </div>
                            <div class="col-md-4 col-sm-4 boot-in">
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <p>Открыт: {{ $time_after_create_search[$loop->index] }}</p>
                            </div>

                            @if(\Illuminate\Support\Facades\Auth::user()->role_id === 3 ||
                            \Illuminate\Support\Facades\Auth::user()->id === $search->user_id)
                                <div class="dell col-md-1 col-sm-1 pull-right">
                                    <form name="delete-search-form-{{ $loop->index }}"
                                          action="{{  route('delete.search', ['search_id' => $search->id])  }}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')

                                        <a class="link" name="delete-search-link-{{ $loop->index }}" href="">
                                            <i class="fa fa-trash" aria-hidden="true"></i> <span
                                                    class="hidden-lg hidden-md hidden-sm">Удалить</span>
                                        </a>
                                    </form>
                                </div>
                            @endif

                        </div>
                    </div>
            @endforeach

            {{--<div class="col-xs-4 col-sm-6 col-md-4 ">--}}
            {{--<nav aria-label="Page navigation">--}}
            {{--{{ $searches->links() }}--}}
            {{--</nav>--}}
            {{--</div>--}}


            <!-------- end my zayawki ------------------->

            </div>

            <div class="row {{--block-top--}} ">
                <div class="col-xs-12 col-sm-12 col-md-12 vertical-align">
                    <nav aria-label="Page navigation" class="">
                        {{ $searches->links() }}
                    </nav>
                </div>
            </div>


        </div>
        <!---------------------- END admin-profile ----------->
        {{--<div id="right-block" class="col-md-4 col-sm-4 hidden-xs">--}}
        {{--<h3>Меню управления</h3>--}}
        {{--<div class="menu-block menu-admin">--}}
        {{--<ul>--}}
        {{--@include('snippets.cabinet_right_menu')--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--</div>--}}

        @include('cabinet.menu.right')

    </div>
@endsection


@section('additional_scripts')
    <script>

        $(document).ready(function () {
            $('#delete-search-link').click(function () {
                $('#delete-search-form').submit();
            });
        });


        // $('#deleteSearch').click(function () {
        //     console.log('clicked');
        //     $('#form').submit();
        // });


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