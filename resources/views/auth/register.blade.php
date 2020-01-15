@extends('layouts.app')


@section('add-script-head')
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection


@section('header-login', 'header-login')

@section('right_menu')
    @include('snippets.requests_by_category')
@endsection

@section('main_add_class', 'registration-center registration-users')

@section('main')
    <div class="col-md-10 col-sm-12 col-xs-12 col-md-push-1 col-sm-push-0">

        @if($errors->any())
            <div class="col-lg-11 alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-lg-2 col-sm-3 col-xs-12 left-block-reg">
            <a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Вход</a>
            <a href="{{ route('register') }}" class="active"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Регистрация</a>
            <div class="bottom-link-soc">
                <p>Войти через соц сети:</p>
                <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-5 col-sm-4 col-xs-12 center-block-reg">
            <h1>Новые возможности для вашего бизнеса</h1>
            <h2>Найти запчасти с нами проще! Простого создайте аккаунт и ищите и выбирайте выгодные предложение от
                продавцов или станьте продавцом</h2>

            <div class="bottom-link">
                <a href="">Условия использования сайта</a>
                <a href="">Политика конфиденциальности</a>
            </div>
        </div>
        <div class="col-lg-4 col-sm-5 col-xs-12 right-block-reg">
            <div class="tabs-user">
                <a href="{{ route('register') }}" class="active">Для пользователей</a>
                <a href="{{ route('register.seller') }}">Для продавцов</a>
            </div>
            <h3>Регистрация</h3>
            <form method="post">
                @csrf
                <input type="hidden" name="role" value="1">
                <p>Логин*</p>
                <input type="text" name="login" value="{{ old('login') }}" placeholder="Введите логин">
                <p>Придумайте пароль*</p>
                <input type="text" name="password" placeholder="Введите пароль">
                <p>Введите телефон*</p>
                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Ваш телефон">
                <p>Email (необязательно)</p>
                <input type="text" name="email" value="{{ old('email') }}" placeholder="Введите Email">
                <p>Город*</p>
                <input type="text" name="city" value="{{ old('city') }}" placeholder="Введите город">
                <p class="text-vertikal">{{ captcha_img() }}</p>
                <input type="text" name="captcha" class="proverka">
                <div class="col-xs-12 no-padding">
                    <input type="radio" name="agreement" class="radiobutton"><em><a href="">Я Соглашаюсь с условием </a></em>
                </div>
                <input id="btnSubmit" class="btn-mi" type="submit" value="Войти">
            </form>
        </div>
    </div>
@endsection


@section('additional_scripts')
    <script>


        //Избавляемся от двойной отправки формы
        $('input[type=submit]').click(function() {
            $(this).attr('disabled', 'disabled');
            $(this).parents('form').submit();
        });


        // $(function () {
        //     // $('#btnReg').prop('disabled', false);
        // });
        //
        //
        // $('form').on('submit', function() {
        //     console.log('Form submit');
        //     $('form').prop('disabled', true);
        // });


        // $('#btnReg').click(function () {
        //
        //    $this.form.submit();
        //     $('#btnReg').prop('disabled', true);
        // });

    </script>
@endsection


@section('before_footer')
    <div class="fon-reg container-fluid"></div>
@endsection