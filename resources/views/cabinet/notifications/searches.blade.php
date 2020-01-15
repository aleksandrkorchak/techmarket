@extends('layouts.notifications')

@section('searches_tab_active', 'active-navbtn')

@section('notifications_route')
    {{ route('show.searches.notifications') }}
@endsection

@section('notification_table')
    <table class="table">
        @foreach($notifications as $notification)
            <tr @empty($notification['read_at']) class="new" @endempty>
                <td style="display: none">{{ $notification['id'] }}</td>
                <td style="display: none">{{ $loop->iteration }}</td>
                <td>
                    <p>{{ 'Пользователь ' . '" ' . $notification['data']['user_login'] . ' " создал новую заявку ' }}</p>
                </td>
                <td>
                    <p><a href="{{ route('show.search.info', [$notification['data']['search_id']]) }}">ссылка</a>
                    </p>
                </td>
                <td class="text-right">
                    <em>{{ $notification['data']['search_created_at'] }}</em>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

{{--@section('additional_scripts')--}}
{{--    <script>--}}

{{--    </script>--}}
{{--@endsection--}}