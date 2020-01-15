<li>
    <a href="{{ route('index') }}">
        <i class="fa fa-home" aria-hidden="true"></i>
        Перейти на главную
    </a>
</li>

<li class="@yield('profile')">
    <a href="{{ route('show.profile', ['user_id' => Auth::id()]) }}">
        <i class="fa fa-user" aria-hidden="true"></i>
        Профиль
    </a>
</li>

<li class="@yield('searches_personal')">
    <a href="{{ route('show.searches', ['menu_search_type' => 'personal']) }}">
        <i class="fa fa-list" aria-hidden="true"></i>
        Мои заявки
    </a>
</li>

@php
    //TODO: Два одинаковых пункта меню, посмотреть как их можно совместить
@endphp
@if(\Illuminate\Support\Facades\Auth::user()->role_id === 2)
    <li class="@yield('searches_all')">
        <a href="{{ route('show.searches', ['menu_search_type' => 'all']) }}">
            <i class="fa fa-list-alt" aria-hidden="true"></i>
            Все заявки
        </a>
    </li>
@endif

@if(\Illuminate\Support\Facades\Auth::user()->role_id === 3)
    <li class="@yield('searches_all')">
        <a href="{{ route('show.searches', ['menu_search_type' => 'all']) }}">
            <i class="fa fa-list-alt" aria-hidden="true"></i>
            Все заявки
        </a>
    </li>
@endif

<li class="@yield('message')">
    <a href="{{ route('show.incoming.messages') }}">
        <i class="fa fa-comments" aria-hidden="true"></i>
        Сообщения <span class="{{--sms--}}"></span>
    </a>
</li>

<li class="@yield('notification')">
    <a href="{{ route('show.users.notifications') }}">
        <i class="fa fa-bell" aria-hidden="true"></i>
        Оповещения
        @if($notifications_count = Auth::user()->notifications()->where('read_at', null)->count())
            <span class="alert">{{ $notifications_count }}</span>
        @endif
    </a>
</li>

@if(\Illuminate\Support\Facades\Auth::user()->role_id === 3)
    <li class="@yield('users')">
        <a href="{{ route('show.users') }}">
            <i class="fa fa-users" aria-hidden="true"></i>
            Пользователи
        </a>
    </li>

    <li class="@yield('settings')">
        <a href="{{ route('show.catalog.settings') }}">
            <i class="fa fa-cog" aria-hidden="true"></i>
            Настройки
        </a>
    </li>
@endif


{{--<li><a href="{{ route('index') }}"><i class="fa fa-home" aria-hidden="true"></i> Перейти на главную</a></li>--}}
{{--<li class="@yield('profile')"><a href="{{ route('show.profile') }}"><i class="fa fa-user" aria-hidden="true"></i>--}}
{{--Профиль</a></li>--}}
{{--<li class="@yield('request')"><a href="{{ route('show.requests') }}"><i class="fa fa-list" aria-hidden="true"></i> Мои--}}
{{--заявки</a>--}}
{{--</li>--}}

{{--@if(\Illuminate\Support\Facades\Auth::user()->role_id === 2)--}}
{{--<li class="@yield('searches_all')"><a href="{{ route('show.searches.all') }}"><i class="fa fa-list-alt" aria-hidden="true"></i>--}}
{{--Все заявки</a>--}}
{{--</li>--}}
{{--@endif--}}

{{--@if(\Illuminate\Support\Facades\Auth::user()->role_id === 3)--}}
{{--<li class="@yield('searches_all')"><a href="{{ route('show.searches.all') }}"><i class="fa fa-list-alt" aria-hidden="true"></i>--}}
{{--Все заявки</a>--}}
{{--</li>--}}
{{--@endif--}}

{{--<li class="@yield('message')"><a href="{{ route('show.messages') }}"><i class="fa fa-comments" aria-hidden="true"></i>--}}
{{--Сообщения</a></li>--}}
{{--<li class="@yield('notification')"><a href="{{ route('show.users.notifications') }}"><i class="fa fa-bell" aria-hidden="true"></i> Оповещения</a></li>--}}
{{--@if(\Illuminate\Support\Facades\Auth::user()->role_id === 3)--}}
{{--<li class="@yield('users')"><a href="{{ route('show.profile') }}"><i class="fa fa-users" aria-hidden="true"></i>--}}
{{--Пользователи</a>--}}
{{--</li>--}}

{{--<li class="@yield('settings')"><a href="{{ route('show.settings') }}"><i class="fa fa-cog" aria-hidden="true"></i>--}}
{{--Настройки</a>--}}
{{--</li>--}}
{{--@endif--}}