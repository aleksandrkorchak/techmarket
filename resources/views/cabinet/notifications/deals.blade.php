@extends('layouts.notifications')

@section('deals_tab_active', 'active-navbtn')

@section('notifications_route')
    {{ route('show.deals.notifications') }}
@endsection

@section('notification_table')
    <table class="table">
        @foreach($notifications as $notification)
            <tr @empty($notification['read_at']) class="new" @endempty>
                <td style="display: none">{{ $notification['id'] }}</td>
                <td style="display: none">{{ $loop->iteration }}</td>
                <td>
                    <p>{{ 'Покупатель ' . '" ' . $notification['data']['customer'] . ' " принял предложение продавца ' . '" ' . $notification['data']['seller'] . ' "' }}</p>
                </td>
                <td>
                    <p><a href="{{ route('show.search.info', [$notification['data']['search_id']]) }}">ссылка</a>
                    </p>
                </td>
                <td class="text-right">
                    <em>{{ $notification['data']['accepted_at'] }}</em>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

{{--@section('additional_scripts')--}}
{{--    <script>--}}

{{--    </script>--}}
{{--@endsection--}}