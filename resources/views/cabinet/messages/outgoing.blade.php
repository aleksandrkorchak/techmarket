@extends('layouts.messages')

@section('outgoing_tab_active', 'active-navbtn')

@section('messages_route')
    {{ route('show.outgoing.messages') }}
@endsection

@section('messages_table')
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