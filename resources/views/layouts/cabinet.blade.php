@extends('layouts.app')

@section('header-login', 'header-login')

{{--@section('searches_all', 'active')--}}

@section('right_menu_xs')
    @include('cabinet.menu.right_xs')
@endsection

@section('right_menu')
    @include('cabinet.menu.right')
@endsection

@section('main_add_class', 'catalogs catalogs-zayawka admin-profile')

