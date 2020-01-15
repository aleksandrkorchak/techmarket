@extends('layouts.search_info')

@section('searches_personal', 'active')

@section('breadcrumb')
    <li><a href="{{ route('show.searches', ['menu_search_type' => 'personal']) }}">Мои заявки на запчасти</a></li>
    <li class="active">{{ $search->spare->name }} для {{ $search->model->brand->name . ' ' . $search->model->name }}</li>
@endsection