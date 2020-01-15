@extends('layouts.profile')

@section('profile', 'active')

@section('add-script-head')
    <script>

        $('.newbtn').bind("click", function () {
            $('#pic').click();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result);
                    $('div i').removeClass('fa-picture-o');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

@section('user-card')
    <form method="post" enctype='multipart/form-data'>
        <div class="upload-ava col-sm-3">
            <label class=newbtn>

                <div class="img-label-not">

                    <i class="fa
                                @empty($user->photo)
                            fa-picture-o
                        @endempty
                            " aria-hidden="true">
                        <img id="image" src="
                                        @isset($user->photo)
                        {{ UploadImage::load('user') . $user->photo }}
                        @else
                                #
                        @endisset
                                " alt=""
                             class="img-responsive"/></i>
                </div>

                <input style="display: none;" id="pic" class='pis' name="photo" onchange="readURL(this);"
                       type="file">
                <p>Добавить фото</p>
            </label>
        </div>

        <div class="info-profile col-sm-9">
            {{--<form>--}}
            @csrf
            <div class="form-group row">
                <label for="name" class="col-lg-3 col-sm-4 col-form-label text-md-right">Имя:</label>
                <div class="col-lg-9 col-sm-8">
                    <input type="text" name="name" value="{{ $user->name }}" placeholder="Ваше имя">
                </div>
            </div>
            <div class="form-group row">
                <label for="surname"
                       class="col-lg-3 col-sm-4 col-form-label text-md-right">Фамилия:</label>
                <div class="col-lg-9 col-sm-8">
                    <input type="text" name="surname" value="{{ $user->surname }}"
                           placeholder="Ваша фамилия">
                </div>
            </div>

            <div class="form-group row">
                <label for="city" class="col-lg-3 col-sm-4 col-form-label text-md-right">Город:</label>
                <div class="col-lg-9 col-sm-8">
                    <input type="text" name="city" value="{{ $user->city }}" placeholder="Ваш город">
                </div>
            </div>
            <div class="form-group row">
                <label for="phone"
                       class="col-lg-3 col-sm-4 col-form-label text-md-right">Телефон:</label>
                <div class="col-lg-9 col-sm-8">
                    <input type="tel" name="phone" value="{{ $user->phone }}"
                           placeholder="+38098-440-88-57">
                </div>
            </div>
            <div class="form-group row">
                <label for="email"
                       class="col-lg-3 col-sm-4 col-form-label text-md-right">E-mail:</label>
                <div class="col-lg-9 col-sm-8">
                    <input type="text" name="email" value="{{ $user->email }}"
                           placeholder="snap-pk@ukr.net">
                </div>
            </div>

            @if($user->role_id == 2 || $user->role_id == 3)

                <div class="form-group row">
                    <label for="organization"
                           class="col-lg-3 col-sm-4 col-form-label text-md-right">Организация:</label>
                    <div class="col-lg-9 col-sm-8">
                        <input type="text" name="organization" value="{{ $user->seller->organization }}"
                               placeholder="Название организации">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="occupation"
                           class="col-lg-3 col-sm-4 col-form-label text-md-right">Род деятельности:</label>
                    <div class="col-lg-9 col-sm-8">
                        <select name="occupation" id="" class="">
                            @foreach($occupations as $key => $name)
                                <option @if($key == $user->seller->occupation_id)
                                        selected
                                        @endif
                                        value="{{ $key }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="devices[]"
                           class="col-lg-3 col-sm-4 col-form-label text-md-right">Категория
                        деятельности:</label>
                    <div class="col-lg-9 col-sm-8">
                        <select name="devices[]" class="form-control" multiple>
                            @foreach($devices as $key => $name)
                                <option
                                        @foreach($user->seller->devices as $category)
                                        @if($key == $category->id)
                                        selected
                                        @endif
                                        @endforeach
                                        value="{{ $key }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            @endif

            <div class="form-group row">
                <label for="login" class="col-lg-3 col-sm-4 col-form-label text-md-right">Login:</label>
                <div class="col-lg-9 col-sm-8">
                    <input type="text" name="login" value="{{ $user->login }}" placeholder="Ваш логин">
                </div>
            </div>
            <div class="form-group row">
                <label for="new_pass" class="col-lg-3 col-sm-4 col-form-label text-md-right">Новый
                    пароль:</label>
                <div class="pass_show col-lg-9 col-sm-8">
                    <input type="password" name="new_pass" value="" placeholder="Новый пароль">
                </div>
            </div>
            <div class="form-group row">
                <label for="old_pass" class="col-lg-3 col-sm-4 col-form-label text-md-right">Текущий
                    пароль:</label>
                <div class="pass_show col-lg-9 col-sm-8">
                    <input type="password" name="old_pass" value="" placeholder="Текущий пароль">
                </div>
            </div>
            {{--</form>--}}
        </div>


        <div class="text-center">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
@endsection
