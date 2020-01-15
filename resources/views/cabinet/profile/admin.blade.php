@extends('layouts.profile')

@section('add-script-head')
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <style>

        .info-profile div.row {
            margin-bottom: 15px;
        }

        .info-profile div.row label {
            /*margin-bottom: 15px;*/
            text-align: right;
            font-size: 14px;
            font-weight: 400;
        }
    </style>
@endsection

@section('users', 'active')

@section('user-card')
    {{--    <form method="post" enctype='multipart/form-data'>--}}
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

        </label>
    </div>

    <div class="info-profile col-sm-9">

        <div class="row">
            <label class="col-lg-3 col-sm-4 col-form-label text-md-right">Login:</label>
            <div class="col-lg-9 col-sm-8">
                <span style="margin: -5px 0px 0px 0px; padding: 5px 10px">{{ $user->login }}</span>
            </div>
        </div>
        <div class="row">
            <label class="col-lg-3 col-sm-4 col-form-label text-md-right">Имя:</label>
            <div class="col-lg-9 col-sm-8">
                <span style="margin: -5px 0px 0px 0px; padding: 5px 10px">{{ $user->name }}</span>
            </div>
        </div>

        <div class="row">
            <label class="col-lg-3 col-sm-4 col-form-label text-md-right">Фамилия:</label>
            <div class="col-lg-9 col-sm-8">
                <span style="margin: -5px 0px 0px 0px; padding: 5px 10px">{{ $user->surname }}</span>
            </div>
        </div>

        <div class="row">
            <label class="col-lg-3 col-sm-4 col-form-label text-md-right">Город:</label>
            <div class="col-lg-9 col-sm-8">
                <span style="margin: -5px 0px 0px 0px; padding: 5px 10px">{{ $user->city }}</span>
            </div>
        </div>
        <div class="row">
            <label class="col-lg-3 col-sm-4 col-form-label text-md-right">Телефон:</label>
            <div class="col-lg-9 col-sm-8">
                <span style="margin: -5px 0px 0px 0px; padding: 5px 10px">{{ $user->phone }}</span>
            </div>
        </div>
        <div class="row">
            <label class="col-lg-3 col-sm-4 col-form-label text-md-right">E-mail:</label>
            <div class="col-lg-9 col-sm-8">
                <span style="margin: -5px 0px 0px 0px; padding: 5px 10px">{{ $user->email }}</span>
            </div>
        </div>

        @if($user->role_id == 2 || $user->role_id == 3)

            <div class="row">
                <label class="col-lg-3 col-sm-4 col-form-label text-md-right">Организация:</label>
                <div class="col-lg-9 col-sm-8">
                    <span style="margin: -5px 0px 0px 0px; padding: 5px 10px">{{ $user->seller->organization }}</span>
                </div>
            </div>

            <div class="row">
                <label class="col-lg-3 col-sm-4 col-form-label text-md-right">Род деятельности:</label>
                <div class="col-lg-9 col-sm-8">
                    @foreach($occupations as $key => $name)
                        @if($key == $user->seller->occupation_id)
                            <span style="margin: -5px 0px 0px 0px; padding: 5px 10px">{{ $name }}</span>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="row">
                <label class="col-lg-3 col-sm-4 col-form-label text-md-right">Категория деятельности:</label>
                <div class="col-lg-9 col-sm-8">
                    @foreach($devices as $key => $name)
                        @foreach($user->seller->devices as $category)
                            @if($key == $category->id)
                                <span style="margin: -5px 0px 0px 0px; padding: 5px 10px">{{ $name }}</span>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>

        @endif

    </div>

@endsection