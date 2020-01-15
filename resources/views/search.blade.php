@extends('layouts.app')

@section('header-login', 'header-login')

@section('right_menu')
    @include('snippets.requests_by_category')
@endsection


@section('main')
    <div class="row">


        @if($errors->any())
            <div class="alert alert-danger col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-md-8 col-sm-8 col-xs-12">
            <h3 style="float:left">Поиск по запросу</h3>
        </div>

        <!---------------------- search-request ----------->
        <div id="search-request" class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <form method="post">
                @csrf
                <div class="col-sm-6">
                    <p>Тип устройства</p>
                    <select id="device" name="device">
                        {{--<option value="0" disabled selected>Выберите</option>--}}
                        @foreach($devices as $key => $device)
                            <option value="{{ $key }}">{{ $device }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6">
                    <p>Выберите марку</p>
                    <select id="brand" name="brand">
                        @foreach($brands as $id => $brand)
                            <option value="{{ $id }}">{{ $brand }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6">
                    <p>Выберите модель</p>
                    <select id="model" name="model">
                    </select>
                </div>
                <div class="col-sm-6">
                    <p>Выберите запасную часть</p>
                    <select id="spare" name="spare">
                    </select>
                </div>
                <div class="col-sm-6">
                    <p>Состояние устройства</p>
                    <select name="state">
                        @foreach($states as $key => $state)
                            <option value="{{ $key }}">{{ $state }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6">
                    <p>Выберите качество</p>
                    <select name="quality">
                        @foreach($qualities as $key => $quality)
                            <option value="{{ $key }}">{{ $quality }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6">
                    <p>Время ожидания предложения</p>
                    <select name="wait">
                        @foreach($waits as $key => $wait)
                            <option value="{{ $key }}">{{ $wait }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12">
                    <p>Оставить коментарий</p>
                    <textarea name="comment"></textarea>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <input class="btn-mi btn-mi-lg col-sm-6 col-xs-12" type="submit" value="Искать">
                </div>
            </form>

        </div>
        <!---------------------- END search-request ----------->
        <div id="right-block" class="col-md-4 col-sm-4 hidden-xs">
            <h3>Запросы по категориям</h3>
            <div class="menu-block">
                <ul id="request_by_category">
                    {{--@yield('requests_by_category')--}}
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('additional_scripts')
    <script>

        $(function () {
            let device = $('#device :selected');
            let brand = $('#brand :selected');

            if (device.length === 1 && brand.length === 1) {
                getModelsByDeviceAndBrand(device.val(), brand.val());
            }

            if (device.length === 1) {
                getSparesByDevice(device.val());
            }

            // console.log(device);
        });

        $('#device, #brand').change(function () {
            let device = $('#device :selected');
            let brand = $('#brand :selected');

            if (device.length === 1 && brand.length === 1) {
                getModelsByDeviceAndBrand(device.val(), brand.val());
            }

        });

        $('#device').change(function () {
            let device = $('#device :selected');
            getSparesByDevice(device.val());
        });


        $('#brand').change(function () {
            // $('#model').empty();
            // $('#spare').empty();
            // getModels();
        });

        $('#model').change(function () {
            // $('#spare').empty();

            getSpares();
        });


        //Get all brands
        function getBrands() {
            $.ajax({
                url: '/ajax/brands',
                method: 'GET',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (brands) {
                    for (let key in brands) if (brands.hasOwnProperty(key)) {
                        $('#brand').append($('<option value="' + key + '">' + brands[key] + '</option>'));
                    }

                    getModels();
                },
                error: function (request, status, error) {
                    errorHandler(request, status, error);
                }
            })
        }

        //Get models for current (device,brand)
        function getModelsByDeviceAndBrand(device_id, brand_id) {
            $.ajax({
                url: '/ajax/models',
                method: 'GET',
                data: {
                    device_id: device_id,
                    brand_id: brand_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function (models) {
                    // console.log(models);
                    $('#model').empty();
                    for (let key in models) if (models.hasOwnProperty(key)) {
                        $('#model').append($('<option value="' + key + '">' + models[key] + '</option>'));
                    }
                }

            })
        }

        //Get spares for current device
        function getSparesByDevice(device_id) {
            $.ajax({
                url: '/ajax/spares',
                method: 'GET',
                data: {
                    device_id: device_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function (spares) {
                    // console.log('Get spares');
                    $('#spare').empty();
                    if (spares.length === 0) {
                        return;
                    }
                    for (let id in spares) if (spares.hasOwnProperty(id)) {
                        $('#spare').append($('<option value="' + id + '">' + spares[id] + '</option>'));
                    }
                }
            })
        }

    </script>
@endsection