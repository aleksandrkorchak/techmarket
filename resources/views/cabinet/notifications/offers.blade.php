@extends('layouts.notifications')

@section('offers_tab_active', 'active-navbtn')

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
                    <p>{{ 'Продавец ' . '" ' . $notification['data']['seller'] . ' " сделал предложение покупателю ' . '" ' . $notification['data']['customer'] . ' "' }}</p>
                </td>
                <td>
                    <p><a href="{{ route('show.search.info', [$notification['data']['search']]) }}">ссылка</a>
                    </p>
                </td>
                <td class="text-right">
                    <em>{{ $notification['data']['date'] }}</em>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

{{--@section('additional_scripts')--}}
{{--    <script>--}}

{{--    </script>--}}
{{--@endsection--}}