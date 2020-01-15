@extends('layouts.cabinet')

@section('add-script-head')
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
        $('[data-toggle="collapse"]').on('click', function () {
            var $this = $(this),
                $parent = typeof $this.data('parent') !== 'undefined' ? $($this.data('parent')) : undefined;
            if ($parent === undefined) { /* Just toggle my  */
                $this.find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
                return true;
            }

            /* Open element will be close if parent !== undefined */
            var currentIcon = $this.find('.glyphicon');
            currentIcon.toggleClass('glyphicon-plus glyphicon-minus');
            $parent.find('.glyphicon').not(currentIcon).removeClass('glyphicon-minus').addClass('glyphicon-plus');

        });
    </script>
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

{{--@section('header-login', 'header-login')--}}

@section('settings', 'active')

{{--@section('right_menu')--}}
{{--    @include('cabinet.menu.right_xs')--}}
{{--@endsection--}}

{{--@section('main_add_class', 'catalogs catalogs-zayawka admin-profile')--}}

@section('main')
    <div class="row">
        <!--------------------- admin-profile----------->
        <h1>Настройки</h1>
        <div id="products" class="col-lg-8 col-md-8 col-sm-8 col-xs-12 profile">

            <div class="row block-top">

                {{--                @if($errors->any())--}}
                {{--<div id="errors" style="padding-top: 20px; display: none">--}}
                <div class="alert alert-danger my-5" style="padding-top: 20px; display: none">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                {{--</div>--}}
                {{--@endif--}}

                <div class="nav-btn">
                    <a href="{{ route('show.catalog.settings') }}" class="active-navbtn">Каталог</a>
                    <a href="">Мета-теги</a>
                    <a href="">Статьи</a>
                </div>


                @yield('body_tab')


            </div>
        </div>
        <!---------------------- END admin-profile ----------->

        @include('cabinet.menu.right')

    </div>
@endsection

{{--@section('additional_scripts')--}}
{{--    <script>--}}

{{--        var btnId;--}}

{{--        $('.alert-danger').hide();--}}
{{--        $('.alert-danger').html('');--}}
{{--        $('#btnEditDevice').attr('disabled', true);--}}
{{--        $('#btnDelDevice').attr('disabled', true);--}}
{{--        $('#btnEditBrand').attr('disabled', true);--}}
{{--        $('#btnDelBrand').attr('disabled', true);--}}
{{--        $('#btnAddModel').attr('disabled', true);--}}
{{--        $('#btnEditModel').attr('disabled', true);--}}
{{--        $('#btnDelModel').attr('disabled', true);--}}
{{--        $('#btnAddSpare').attr('disabled', true);--}}
{{--        $('#btnEditSpare').attr('disabled', true);--}}
{{--        $('#btnDelSpare').attr('disabled', true);--}}



{{--        //Display model if device and brand are selected--}}
{{--        $('#device, #brand').change(function () {--}}


{{--            let idDeviceSelected = $('#device :selected').val();--}}
{{--            let idBrandSelected = $('#brand :selected').val();--}}

{{--            if (idDeviceSelected && idBrandSelected) {--}}
{{--                $('#model').empty();--}}
{{--                $('#btnAddModel').attr('disabled', false);--}}
{{--                getModelsByDeviceAndBrand(idDeviceSelected, idBrandSelected);--}}
{{--            }--}}

{{--        });--}}

{{--        $('#device').change(function () {--}}
{{--            // $('#model').empty();--}}
{{--            $('#spare').empty();--}}
{{--            $('#btnEditDevice').attr('disabled', false);--}}
{{--            $('#btnDelDevice').attr('disabled', false)--}}
{{--            //$('#btnDelSpare').attr('disabled', false);--}}
{{--            $('#btnAddSpare').prop('disabled', false);--}}
{{--            let idSelectedDevice = $('#device :selected').val();--}}
{{--            getSparesByDevice(idSelectedDevice);--}}
{{--        });--}}

{{--        //Click button "delete device"--}}
{{--        $('#btnDelDevice').click(function () {--}}
{{--            $('#btnDelDevice').prop('disabled', true);--}}
{{--            let selDevice = $('#device :selected');--}}
{{--            let numberSelectedDevices = selDevice.length;--}}
{{--            if (numberSelectedDevices === 1) {--}}
{{--                let device_id = selDevice.val();--}}
{{--                deleteSelectedDevice(device_id);--}}
{{--            }--}}
{{--            // setTimeout(function () {--}}
{{--            //     $('#btnDelDevice').prop('disabled', false);--}}
{{--            // }, 200)--}}
{{--        });--}}

{{--        //Selected brand--}}
{{--        $('#brand').change(function () {--}}
{{--            $('#model').empty();--}}
{{--            $('#btnEditBrand').attr('disabled', false);--}}
{{--            $('#btnDelBrand').attr('disabled', false);--}}
{{--            $('#btnEditModel').attr('disabled', true);--}}
{{--            $('#btnDelModel').attr('disabled', true);--}}
{{--        });--}}

{{--        //Click button "delete brand"--}}
{{--        $('#btnDelBrand').click(function () {--}}
{{--            $('#btnDelBrand').prop('disabled', true);--}}
{{--            let selBrand = $('#brand :selected');--}}
{{--            let numberSelectedBrands = selBrand.length;--}}
{{--            if (numberSelectedBrands === 1) {--}}
{{--                let brand_id = selBrand.val();--}}
{{--                deleteBrand(brand_id);--}}
{{--            }--}}
{{--            // setTimeout(function () {--}}
{{--            //     $('#btnDelBrand').prop('disabled', false);--}}
{{--            // }, 300);--}}
{{--        });--}}


{{--        //Selected model--}}
{{--        $('#model').change(function () {--}}
{{--            $('#btnEditModel').attr('disabled', false);--}}
{{--            $('#btnDelModel').attr('disabled', false);--}}
{{--        });--}}


{{--        //Click button "delete model"--}}
{{--        $('#btnDelModel').click(function () {--}}
{{--            $('#btnDelModel').prop("disabled", true);--}}
{{--            let selModel = $('#model :selected');--}}
{{--            let numberSelectedModels = selModel.length;--}}
{{--            // console.log(numberSelectedModels);--}}
{{--            if (numberSelectedModels === 1) {--}}
{{--                let model_id = selModel.val();--}}
{{--                deleteModel(model_id);--}}
{{--            }--}}
{{--            // setTimeout(function () {--}}
{{--            //     $('#btnDelModel').prop("disabled", false);--}}
{{--            // }, 300);--}}
{{--        });--}}


{{--        //Selected spare--}}
{{--        $('#spare').change(function () {--}}
{{--            $('#btnEditSpare').attr('disabled', false);--}}
{{--            $('#btnDelSpare').attr('disabled', false);--}}
{{--        });--}}


{{--        //Click button "delete spare"--}}
{{--        $('#btnDelSpare').click(function () {--}}
{{--            $('#btnDelSpare').prop("disabled", true);--}}
{{--            let selSpare = $('#spare :selected');--}}
{{--            let numberSelectedSpares = selSpare.length;--}}
{{--            if (numberSelectedSpares === 1) {--}}
{{--                let device_id = $('#device :selected').val();--}}
{{--                let spare_id = selSpare.val();--}}
{{--                deleteSpare(device_id, spare_id);--}}
{{--            }--}}
{{--            // setTimeout(function () {--}}
{{--            //     $('#btnDelSpare').prop("disabled", false);--}}
{{--            // }, 300);--}}
{{--        });--}}


{{--        //Show modal window--}}
{{--        $('#modalWindow').on('show.bs.modal', function (e) {--}}
{{--            let header = e.relatedTarget.dataset.header;--}}
{{--            btnId = e.relatedTarget.id;--}}
{{--            $('.modal-title').text(header);--}}

{{--        });--}}


{{--        //Button "Save" clicked in modal window--}}
{{--        $('#btnModalSave').click(function () {--}}

{{--            let device_id = $('#device').val();--}}
{{--            let newValue = $('#newValue').val();--}}
{{--            let modalWindow = $('#modalWindow');--}}

{{--            switch (btnId) {--}}
{{--                case 'btnAddDevice':--}}
{{--                    addDevice(newValue);--}}
{{--                    modalWindow.modal('toggle');--}}
{{--                    break;--}}
{{--                case 'btnEditDevice':--}}

{{--                    if (newValue) {--}}
{{--                        // let device_id = $('#device').val();--}}
{{--                        updateDevice(device_id, newValue);--}}
{{--                        modalWindow.modal('toggle');--}}
{{--                    }--}}
{{--                    break;--}}

{{--                case 'btnAddBrand':--}}
{{--                    addBrand(newValue);--}}
{{--                    modalWindow.modal('toggle');--}}
{{--                    break;--}}

{{--                case 'btnEditBrand':--}}
{{--                    if (newValue) {--}}
{{--                        let brand_id = $('#brand').val();--}}
{{--                        updateBrand(brand_id, newValue);--}}
{{--                        modalWindow.modal('toggle');--}}
{{--                    }--}}
{{--                    break;--}}

{{--                case 'btnAddModel':--}}
{{--                    // let device_id = $('#device :selected').val();--}}
{{--                    let brand_id = $('#brand :selected').val();--}}
{{--                    addModel(device_id, brand_id, newValue);--}}
{{--                    modalWindow.modal('toggle');--}}
{{--                    break;--}}

{{--                case 'btnEditModel':--}}
{{--                    let model_id = $('#model').val();--}}
{{--                    updateModel(model_id, newValue);--}}
{{--                    modalWindow.modal('toggle');--}}
{{--                    break;--}}

{{--                case 'btnAddSpare':--}}
{{--                    //var device_id = $('#device :selected').val();--}}
{{--                    // console.log(device_id);--}}
{{--                    addSpare(device_id, newValue);--}}
{{--                    modalWindow.modal('toggle');--}}
{{--                    break;--}}

{{--                case 'btnEditSpare':--}}
{{--                    let spare_id = $('#spare').val();--}}
{{--                    updateSpare(spare_id, newValue);--}}
{{--                    modalWindow.modal('toggle');--}}
{{--                    break;--}}
{{--            }--}}

{{--            //Clear text field and close modal window--}}
{{--            btnId = '';--}}
{{--            $('#newValue').val('');--}}
{{--        });--}}



{{--        ///////////////////   Devices   ////////////////////////////////////////////////////////////////////////////////--}}


{{--        //Get all devices--}}
{{--        function getAllDevices() {--}}
{{--            $.ajax({--}}
{{--                url: '/ajax/devices',--}}
{{--                method: 'GET',--}}
{{--                data: {--}}
{{--                    _token: '{{ csrf_token() }}'--}}
{{--                },--}}
{{--                success: function (devices) {--}}
{{--                    // console.log(devices);--}}
{{--                    $('#device').empty();--}}

{{--                    for (let key in devices) if (devices.hasOwnProperty(key)) {--}}
{{--                        $('#device').append($('<option value="' + key + '">' + devices[key] + '</option>'));--}}
{{--                    }--}}

{{--                },--}}
{{--                error: function (request, status, error) {--}}
{{--                    errorHandler(request, status, error);--}}
{{--                }--}}
{{--            })--}}
{{--        }--}}





{{--        function addDevice(deviceName) {--}}

{{--            let names = [deviceName];--}}

{{--            $.ajax({--}}
{{--                url: '/ajax/devices',--}}
{{--                method: 'POST',--}}
{{--                data: {--}}
{{--                    devices: names,--}}
{{--                    _token: '{{ csrf_token() }}'--}}
{{--                },--}}
{{--                success: function (result) {--}}
{{--                    if (result) {--}}
{{--                        $('#btnDelDevice').prop('disabled', true);--}}
{{--                        $('#btnEditDevice').prop('disabled', true);--}}
{{--                        getAllDevices();--}}
{{--                    }--}}

{{--                },--}}
{{--                error: function (request, status, error) {--}}
{{--                    errorHandler(request, status, error);--}}
{{--                }--}}
{{--            });--}}

{{--        }--}}


{{--        //Delete selected device--}}
{{--        function deleteSelectedDevice(device_id) {--}}

{{--            devices = [device_id];--}}

{{--            $.ajax({--}}
{{--                url: '/ajax/devices',--}}
{{--                method: 'DELETE',--}}
{{--                data: {--}}
{{--                    devices: devices,--}}
{{--                    _token: '{{ csrf_token() }}'--}}
{{--                },--}}
{{--                success: function (result) {--}}
{{--                    if (result > 0) {--}}
{{--                        getAllDevices();--}}
{{--                        $('#model').empty();--}}
{{--                        $('#spare').empty();--}}
{{--                        $('#btnDelDevice').attr('disabled', true);--}}
{{--                        $('#btnEditDevice').attr('disabled', true);--}}
{{--                        $('#btnAddSpare').attr('disabled', true);--}}
{{--                    }--}}
{{--                },--}}
{{--                error: function (request, status, error) {--}}
{{--                    errorHandler(request, status, error);--}}
{{--                }--}}

{{--            })--}}

{{--        }--}}


{{--        function updateDevice(device_id, new_device_name) {--}}

{{--            $.ajax({--}}
{{--                url: '/ajax/devices',--}}
{{--                method: 'PUT',--}}
{{--                data: {--}}
{{--                    device_id: device_id,--}}
{{--                    device_name: new_device_name,--}}
{{--                    _token: '{{ csrf_token() }}'--}}
{{--                },--}}
{{--                success: function ($result) {--}}
{{--                    if ($result) {--}}
{{--                        $('#device :selected').text(new_device_name);--}}
{{--                    }--}}
{{--                },--}}
{{--                error: function (request, status, error) {--}}
{{--                    errorHandler(request, status, error);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}


{{--        ///////////////////   Devices   ////////////////////////////////////////////////////////////////////////////////--}}



{{--        ///////////////////   Brands   /////////////////////////////////////////////////////////////////////////////////--}}

{{--        //Add new brand--}}
{{--        function addBrand(brand_name) {--}}

{{--            let names = [brand_name];--}}

{{--            $.ajax({--}}
{{--                url: '/ajax/brands',--}}
{{--                method: 'POST',--}}
{{--                data: {--}}
{{--                    brands: names,--}}
{{--                    _token: '{{ csrf_token() }}'--}}
{{--                },--}}
{{--                success: function (result) {--}}
{{--                    if (result) {--}}
{{--                        $('#btnDelBrand').prop('disabled', true);--}}
{{--                        $('#btnEditBrand').prop('disabled', true);--}}
{{--                        $('#btnAddModel').prop('disabled', true);--}}
{{--                        $('#btnDelModel').prop('disabled', true);--}}
{{--                        $('#btnEditModel').prop('disabled', true);--}}
{{--                        getAllBrands();--}}
{{--                    }--}}
{{--                },--}}
{{--                error: function (request, status, error) {--}}
{{--                    errorHandler(request, status, error);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}


{{--        function updateBrand(brand_id, new_brand_name) {--}}
{{--            $.ajax({--}}
{{--                url: '/ajax/brands',--}}
{{--                method: 'PUT',--}}
{{--                data: {--}}
{{--                    brand_id: brand_id,--}}
{{--                    brand_name: new_brand_name,--}}
{{--                    _token: '{{ csrf_token() }}'--}}
{{--                },--}}
{{--                success: function ($result) {--}}
{{--                    if ($result) {--}}
{{--                        $('#brand :selected').text(new_brand_name);--}}
{{--                    }--}}
{{--                },--}}
{{--                error: function (request, status, error) {--}}
{{--                    errorHandler(request, status, error);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}


{{--        //Delete selected brand--}}
{{--        function deleteBrand(brand_id) {--}}

{{--            let brands = [brand_id];--}}

{{--            $.ajax({--}}
{{--                url: '/ajax/brands',--}}
{{--                method: 'DELETE',--}}
{{--                data: {--}}
{{--                    brands: brands,--}}
{{--                    _token: '{{ csrf_token() }}'--}}
{{--                },--}}
{{--                success: function (result) {--}}
{{--                    if (result > 0) {--}}
{{--                        $('#model').empty();--}}
{{--                        $('#btnEditBrand').attr('disabled', true);--}}
{{--                        $('#btnDelBrand').attr('disabled', true);--}}
{{--                        $('#btnAddModel').attr('disabled', true);--}}
{{--                        getAllBrands();--}}
{{--                    }--}}
{{--                },--}}
{{--                error: function (request, status, error) {--}}
{{--                    errorHandler(request, status, error);--}}
{{--                }--}}
{{--            });--}}

{{--        }--}}


{{--        //Get all brands--}}
{{--        function getAllBrands() {--}}
{{--            $.ajax({--}}
{{--                url: '/ajax/brands/',--}}
{{--                method: 'GET',--}}
{{--                data: {--}}
{{--                    _token: '{{ csrf_token() }}'--}}
{{--                },--}}
{{--                success: function (brands) {--}}
{{--                    $('#brand').empty();--}}
{{--                    for (let id in brands) if (brands.hasOwnProperty(id)) {--}}
{{--                        $('#brand').append($('<option value="' + id + '">' + brands[id] + '</option>'));--}}
{{--                    }--}}
{{--                },--}}
{{--                error: function (request, status, error) {--}}
{{--                    errorHandler(request, status, error);--}}
{{--                }--}}
{{--            })--}}
{{--        }--}}


{{--        ///////////////////   Brands   /////////////////////////////////////////////////////////////////////////////////--}}


{{--        ///////////////////   Model   //////////////////////////////////////////////////////////////////////////////////--}}


{{--        //Add model by device and brand--}}
{{--        function addModel(device_id, brand_id, new_value) {--}}

{{--            let names = [new_value];--}}

{{--            $.ajax({--}}
{{--                url: '/ajax/models',--}}
{{--                method: 'POST',--}}
{{--                data: {--}}
{{--                    device_id: device_id,--}}
{{--                    brand_id: brand_id,--}}
{{--                    models: names,--}}
{{--                    _token: '{{ csrf_token() }}'--}}
{{--                },--}}
{{--                success: function (result) {--}}
{{--                    if (result) {--}}
{{--                        $('#model').empty();--}}
{{--                        $('#btnDelModel').prop('disabled', true);--}}
{{--                        $('#btnEditModel').prop('disabled', true);--}}
{{--                        getModelsByDeviceAndBrand(device_id, brand_id);--}}
{{--                    }--}}
{{--                },--}}
{{--                error: function (request, status, error) {--}}
{{--                    errorHandler(request, status, error);--}}
{{--                }--}}

{{--            })--}}
{{--        }--}}


{{--        //Update model--}}
{{--        function updateModel(model_id, new_model_name) {--}}
{{--            $.ajax({--}}
{{--                url: '/ajax/models',--}}
{{--                method: 'PUT',--}}
{{--                data: {--}}
{{--                    model_id: model_id,--}}
{{--                    model_name: new_model_name,--}}
{{--                    _token: '{{ csrf_token() }}'--}}
{{--                },--}}
{{--                success: function (result) {--}}
{{--                    if (result) {--}}
{{--                        $('#model').empty();--}}
{{--                        $('#btnEditModel').prop('disabled', true);--}}
{{--                        $('#btnDelModel').prop('disabled', true);--}}
{{--                        device_id = $('#device :selected').val();--}}
{{--                        brand_id = $('#brand :selected').val();--}}
{{--                        getModelsByDeviceAndBrand(device_id, brand_id);--}}

{{--                    }--}}
{{--                },--}}
{{--                error: function (request, status, error) {--}}
{{--                    errorHandler(request, status, error);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}


{{--        //Get models for current (device,brand)--}}
{{--        function getModelsByDeviceAndBrand(device_id, brand_id) {--}}
{{--            $.ajax({--}}
{{--                url: '/ajax/models',--}}
{{--                method: 'GET',--}}
{{--                data: {--}}
{{--                    device_id: device_id,--}}
{{--                    brand_id: brand_id,--}}
{{--                    _token: '{{ csrf_token() }}'--}}
{{--                },--}}
{{--                success: function (models) {--}}
{{--                    // $('#models').empty();--}}
{{--                    for (let id in models) if (models.hasOwnProperty(id)) {--}}
{{--                        $('#model').append($('<option value="' + id + '">' + models[id] + '</option>'));--}}
{{--                    }--}}

{{--                },--}}
{{--                error: function (request, status, error) {--}}
{{--                    errorHandler(request, status, error);--}}
{{--                }--}}

{{--            })--}}
{{--        }--}}


{{--        //Delete selected model--}}
{{--        function deleteModel(model_id) {--}}

{{--            let models = [model_id];--}}

{{--            // console.log(models);--}}

{{--            $.ajax({--}}
{{--                url: '/ajax/models',--}}
{{--                method: 'DELETE',--}}
{{--                data: {--}}
{{--                    models: models,--}}
{{--                    _token: '{{ csrf_token() }}'--}}
{{--                },--}}
{{--                success: function (result) {--}}
{{--                    if (result > 0) {--}}
{{--                        $('#model').empty();--}}
{{--                        $('#btnEditModel').prop('disabled', true);--}}
{{--                        let device_id = $('#device :selected').val();--}}
{{--                        let brand_id = $('#brand :selected').val();--}}
{{--                        getModelsByDeviceAndBrand(device_id, brand_id);--}}
{{--                    }--}}
{{--                },--}}
{{--                error: function (request, status, error) {--}}
{{--                    errorHandler(request, status, error);--}}
{{--                }--}}
{{--            });--}}

{{--        }--}}


{{--        ///////////////////   Model   //////////////////////////////////////////////////////////////////////////////////--}}



{{--        ///////////////////   Spare   //////////////////////////////////////////////////////////////////////////////////--}}


{{--        //Add spare by device--}}
{{--        function addSpare(device_id, new_value) {--}}

{{--            let names = [new_value];--}}

{{--            // console.log(device_id + ': ' + new_value);--}}

{{--            $.ajax({--}}
{{--                url: '/ajax/spares',--}}
{{--                method: 'POST',--}}
{{--                data: {--}}
{{--                    device_id: device_id,--}}
{{--                    spares: names,--}}
{{--                    _token: '{{ csrf_token() }}'--}}
{{--                },--}}
{{--                success: function (result) {--}}
{{--                    console.log(result);--}}
{{--                    if (result > 0) {--}}
{{--                        $('#spare').empty();--}}
{{--                        getSparesByDevice(device_id);--}}
{{--                    }--}}
{{--                },--}}
{{--                error: function (request, status, error) {--}}
{{--                    errorHandler(request, status, error);--}}
{{--                }--}}

{{--            })--}}
{{--        }--}}


{{--        function updateSpare(spare_id, new_spare_name) {--}}

{{--            $.ajax({--}}
{{--                url: '/ajax/spares',--}}
{{--                method: 'PUT',--}}
{{--                data: {--}}
{{--                    spare_id: spare_id,--}}
{{--                    spare_name: new_spare_name,--}}
{{--                    _token: '{{ csrf_token() }}'--}}
{{--                },--}}
{{--                success: function (result) {--}}
{{--                    if (result) {--}}
{{--                        $('#spare :selected').text(new_spare_name);--}}
{{--                    }--}}
{{--                },--}}
{{--                error: function (request, status, error) {--}}
{{--                    errorHandler(request, status, error);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}


{{--        //Delete selected spare of the device--}}
{{--        function deleteSpare(device_id, spare_id) {--}}

{{--            let spares = [spare_id];--}}

{{--            console.log(spares);--}}

{{--            $.ajax({--}}
{{--                url: '/ajax/spares',--}}
{{--                method: 'DELETE',--}}
{{--                data: {--}}
{{--                    device_id: device_id,--}}
{{--                    spares: spares,--}}
{{--                    _token: '{{ csrf_token() }}'--}}
{{--                },--}}
{{--                success: function (result) {--}}
{{--                    if (result > 0) {--}}
{{--                        // let device_id = $('#device :selected').val();--}}
{{--                        $('#btnDelSpare').prop('disabled', true);--}}
{{--                        $('#btnEditSpare').prop('disabled', true);--}}
{{--                        getSparesByDevice(device_id);--}}
{{--                    }--}}
{{--                },--}}
{{--                error: function (request, status, error) {--}}
{{--                    errorHandler(request, status, error);--}}
{{--                }--}}
{{--            });--}}

{{--        }--}}


{{--        //Get spares for current device--}}
{{--        function getSparesByDevice(device_id) {--}}
{{--            $.ajax({--}}
{{--                url: '/ajax/spares',--}}
{{--                method: 'GET',--}}
{{--                data: {--}}
{{--                    device_id: device_id,--}}
{{--                    _token: '{{ csrf_token() }}'--}}
{{--                },--}}
{{--                success: function (spares) {--}}
{{--                    $('#spare').empty();--}}
{{--                    for (let id in spares) if (spares.hasOwnProperty(id)) {--}}
{{--                        $('#spare').append($('<option value="' + id + '">' + spares[id] + '</option>'));--}}
{{--                    }--}}

{{--                },--}}
{{--                error: function (request, status, error) {--}}
{{--                    errorHandler(request, status, error);--}}
{{--                }--}}
{{--            })--}}
{{--        }--}}



{{--        ///////////////////   Spare   //////////////////////////////////////////////////////////////////////////////////--}}



{{--        function errorHandler(request, status, error) {--}}
{{--            let json = $.parseJSON(request.responseText);--}}
{{--            let err = $('.alert-danger');--}}
{{--            err.html('');--}}
{{--            err.show();--}}
{{--            $.each(json.errors, function (key, value) {--}}
{{--                err.append('<p>' + value + '</p>');--}}
{{--            });--}}
{{--            err.delay(5000).fadeOut();--}}
{{--        }--}}


{{--    </script>--}}
{{--@endsection--}}