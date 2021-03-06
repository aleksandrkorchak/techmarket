@extends('layouts.app')

@section('header-login', 'header-login')

@section('right_menu')
    @include('snippets.requests_by_category')
@endsection


@section('main_add_class', 'registration-center registration-sellers')

@section('main')
    <div class="col-xs-12">

        @if($errors->any())
            <div class="col-lg-12 alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 left-block-reg">
            <a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Вход</a>
            <a href="{{ route('register') }}" class="active"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Регистрация</a>
            <div class="bottom-link-soc">
                <p>Войти через соц сети:</p>
                <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 center-block-reg">
            <h1>Новые возможности для вашего бизнеса</h1>
            <h2>Найти запчасти с нами проще! Простого создайте аккаунт и ищите и выбирайте выгодные предложение от
                продавцов или станьте продавцом</h2>

            <div class="bottom-link">
                <a href="">Условия использования сайта</a>
                <a href="">Политика конфиденциальности</a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12 right-block-reg">
            <div class="tabs-user">
                <a href="{{ route('register') }}">Для пользователей</a>
                <a href="{{ route('register.seller') }}" class="active">Для продавцов</a>
            </div>
            <h3>Регистрация продавцов</h3>
            <form method="post">
                @csrf
                <input type="hidden" name="role" value="2">
                <div class="col-md-6">
                    <p>Введите логин*</p>
                    <input type="text" name="login" value="{{ old('login') }}" placeholder="Введите логин">
                </div>
                <div class="col-md-6">
                    <p>Пароль*</p>
                    <input type="text" name="password" value="" placeholder="Введите пароль">
                </div>
                <div class="col-md-6">
                    <p>Email*</p>
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Введите Email">
                </div>
                <div class="col-md-6">
                    <p>Телефон*</p>
                    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Введите телефон">
                </div>
                <div class="col-md-6">
                    <p>Название организации*</p>
                    <input type="text" name="organization" value="{{ old('organization') }}"
                           placeholder="Введите название">
                </div>
                <div class="col-md-6">
                    <p>Город*</p>
                    <input type="text" name="city" value="{{ old('city') }}" placeholder="Введите город">
                </div>
                <div class="col-md-6">
                    <p>Продавец или сервис?*</p>
                    <select name="occupation">
                        @foreach($occupations as $key => $occupation)
                            <option value="{{ $key }}">{{ $occupation }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <p>Категория деятельности:</p>
                    <select name="devices[]" multiple>
                        @foreach($categories as $key => $category)
                            <option value="{{ $key }}">{{ $category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <p class="text-vertikal">{{ captcha_img() }}</p>
                    <input type="text" name="captcha" class="proverka">
                </div>
                <div class="col-xs-12 no-padding">
                    <input type="radio" name="agreement" class="radiobutton"><em><a href="">Я Соглашаюсь с условием </a></em>
                </div>
                <input class="btn-mi col-xs-12" type="submit" value="Зарегистрироваться">
            </form>
        </div>
    </div>
@endsection

@section('additional_scripts')
    <script>
        //Избавляемся от двойной отправки формы в фронте
        $('input[type=submit]').click(function() {
            $(this).attr('disabled', 'disabled');
            $(this).parents('form').submit();
        });
    </script>
@endsection


@section('before_footer')
    <div class="fon-reg container-fluid"></div>
@endsection