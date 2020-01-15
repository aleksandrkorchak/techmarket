@extends('layouts.app')

@section('header-login', 'header-login')

@section('right_menu')
    @include('snippets.requests_by_category')
@endsection

{{--@section('menu_personal_xs')--}}
    {{--@include('snippets.menu_registration_xs')--}}
{{--@endsection--}}

@section('main_add_class', 'registration-center')

@section('main')
    <div class="col-md-10 col-sm-12 col-xs-12 col-md-push-1 col-sm-push-0">

        @if ($errors->any())
            <div class="col-lg-11 alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-lg-2 col-sm-3 col-xs-12 left-block-reg">
            <a href="{{ route('login') }}" class="active"><i class="fa fa-sign-in" aria-hidden="true"></i>Вход</a>
            <a href="{{ route('register') }}"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Регистрация</a>
        </div>
        <div class="col-lg-5 col-sm-4 col-xs-12 center-block-reg">
            <h1>Доброго времени суток!</h1>
            <h2>Мы рады снова видеть вас на сайте.
                С уважением Администрация E17!</h2>

            <div class="bottom-link">
                <a href="">Условия использования сайта</a>
                <a href="">Политика конфиденциальности</a>
            </div>
        </div>
        <div class="col-lg-4 col-sm-5 col-xs-12 right-block-reg">
            <h3>Вход</h3>
            <form method="post">
                @csrf
                <p>Введите логин*</p>
                <input type="text" name="login" placeholder="Ваш логин">
                <p>Введите пароль*</p>
                <input type="text" name="password" placeholder="Ваш пароль">
                <p class="text-vertikal">{{ captcha_img() }}</p>
                <input type="text" name="captcha" class="proverka">
                <input class="btn-mi" type="submit" value="Войти">
            </form>
        </div>
    </div>

@endsection

@section('before_footer')
    <div class="fon-reg container-fluid"></div>
@endsection
