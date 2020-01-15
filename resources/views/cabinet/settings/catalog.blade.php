@extends('layouts.settings')

@section('body_tab')
    <div class="grey-field col-xs-12">
        <div class="top-buffer">

            <div class="form-group row">
                <label for="device" class="col-lg-3 col-sm-4 col-form-label text-md-right">Тип
                    устройства:
                    <div class="btn-group" role="group"
                         aria-label="...">
                        <button id="btnAddDevice" type="button" class="btn btn-default"
                                data-toggle="modal" data-target="#modalWindow"
                                data-header="Добавить устройство">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                        <button id="btnDelDevice" type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-minus"></span>
                        </button>
                        <button id="btnEditDevice" type="button" class="btn btn-default"
                                data-toggle="modal" data-target="#modalWindow"
                                data-header="Изменить название устройства">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button>
                    </div>
                </label>
                <div class="col-lg-9 col-sm-8">
                    <select class="form-control" id="device" name="device" size="5">
                        @foreach($devices as $id => $device)
                            <option value="{{ $id }}">{{ $device }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label for="brand" class="col-lg-3 col-sm-4 col-form-label text-md-right">Марка:
                    <div class="btn-group" role="group" aria-label="...">
                        <button id="btnAddBrand" type="button" class="btn btn-default"
                                data-toggle="modal" data-target="#modalWindow" data-header="Добавить марку">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                        <button id="btnDelBrand" type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-minus"></span>
                        </button>
                        <button id="btnEditBrand" type="button" class="btn btn-default"
                                data-toggle="modal" data-target="#modalWindow"
                                data-header="Изменить название марки">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button>
                    </div>
                </label>
                <div class="col-lg-9 col-sm-8">
                    <select class="form-control" id="brand" name="brand" size="5">
                        @foreach($brands as $id => $brand)
                            <option value="{{ $id }}">{{ $brand }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label for="model" class="col-lg-3 col-sm-4 col-form-label text-md-right">Модель:
                    <div class="btn-group" role="group" aria-label="...">
                        <button id="btnAddModel" type="button" class="btn btn-default"
                                data-toggle="modal" data-target="#modalWindow"
                                data-header="Добавить модель">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                        <button id="btnDelModel" type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-minus"></span>
                        </button>
                        <button id="btnEditModel" type="button" class="btn btn-default"
                                data-toggle="modal" data-target="#modalWindow"
                                data-header="Изменить название модели">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button>
                    </div>
                </label>
                <div class="col-lg-9 col-sm-8">
                    <select class="form-control" id="model" name="model" size="5"></select>
                </div>
            </div>


            <div class="form-group row">
                <label for="spare" class="col-lg-3 col-sm-4 col-form-label text-md-right">Запасная
                    часть:
                    <div class="btn-group" role="group" aria-label="...">
                        <button id="btnAddSpare" type="button" class="btn btn-default"
                                data-toggle="modal" data-target="#modalWindow"
                                data-header="Добавить запчасть">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                        <button id="btnDelSpare" type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-minus"></span>
                        </button>
                        <button id="btnEditSpare" type="button" class="btn btn-default"
                                data-toggle="modal" data-target="#modalWindow"
                                data-header="Изменить название запчасти">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button>
                    </div>
                </label>
                <div class="col-lg-9 col-sm-8">
                    <select class="form-control" id="spare" name="spare" size="5"></select>
                </div>
            </div>

        </div>

        {{--Modal window--}}
        <div id="modalWindow" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Заголовок модального окна</h4>
                    </div>
                    <div class="modal-body">
                        <input id="newValue" type="text" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button id="btnModalSave" type="button" class="btn btn-primary">Сохранить</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('additional_scripts')
    <script>

        var btnId;

        $('.alert-danger').hide();
        $('.alert-danger').html('');
        $('#btnEditDevice').attr('disabled', true);
        $('#btnDelDevice').attr('disabled', true);
        $('#btnEditBrand').attr('disabled', true);
        $('#btnDelBrand').attr('disabled', true);
        $('#btnAddModel').attr('disabled', true);
        $('#btnEditModel').attr('disabled', true);
        $('#btnDelModel').attr('disabled', true);
        $('#btnAddSpare').attr('disabled', true);
        $('#btnEditSpare').attr('disabled', true);
        $('#btnDelSpare').attr('disabled', true);


        //Display model if device and brand are selected
        $('#device, #brand').change(function () {


            let idDeviceSelected = $('#device :selected').val();
            let idBrandSelected = $('#brand :selected').val();

            if (idDeviceSelected && idBrandSelected) {
                $('#model').empty();
                $('#btnAddModel').attr('disabled', false);
                getModelsByDeviceAndBrand(idDeviceSelected, idBrandSelected);
            }

        });

        $('#device').change(function () {
            // $('#model').empty();
            $('#spare').empty();
            $('#btnEditDevice').attr('disabled', false);
            $('#btnDelDevice').attr('disabled', false)
            //$('#btnDelSpare').attr('disabled', false);
            $('#btnAddSpare').prop('disabled', false);
            let idSelectedDevice = $('#device :selected').val();
            getSparesByDevice(idSelectedDevice);
        });

        //Click button "delete device"
        $('#btnDelDevice').click(function () {
            $('#btnDelDevice').prop('disabled', true);
            let selDevice = $('#device :selected');
            let numberSelectedDevices = selDevice.length;
            if (numberSelectedDevices === 1) {
                let device_id = selDevice.val();
                deleteSelectedDevice(device_id);
            }
            // setTimeout(function () {
            //     $('#btnDelDevice').prop('disabled', false);
            // }, 200)
        });

        //Selected brand
        $('#brand').change(function () {
            $('#model').empty();
            $('#btnEditBrand').attr('disabled', false);
            $('#btnDelBrand').attr('disabled', false);
            $('#btnEditModel').attr('disabled', true);
            $('#btnDelModel').attr('disabled', true);
        });

        //Click button "delete brand"
        $('#btnDelBrand').click(function () {
            $('#btnDelBrand').prop('disabled', true);
            let selBrand = $('#brand :selected');
            let numberSelectedBrands = selBrand.length;
            if (numberSelectedBrands === 1) {
                let brand_id = selBrand.val();
                deleteBrand(brand_id);
            }
            // setTimeout(function () {
            //     $('#btnDelBrand').prop('disabled', false);
            // }, 300);
        });


        //Selected model
        $('#model').change(function () {
            $('#btnEditModel').attr('disabled', false);
            $('#btnDelModel').attr('disabled', false);
        });


        //Click button "delete model"
        $('#btnDelModel').click(function () {
            $('#btnDelModel').prop("disabled", true);
            let selModel = $('#model :selected');
            let numberSelectedModels = selModel.length;
            // console.log(numberSelectedModels);
            if (numberSelectedModels === 1) {
                let model_id = selModel.val();
                deleteModel(model_id);
            }
            // setTimeout(function () {
            //     $('#btnDelModel').prop("disabled", false);
            // }, 300);
        });


        //Selected spare
        $('#spare').change(function () {
            $('#btnEditSpare').attr('disabled', false);
            $('#btnDelSpare').attr('disabled', false);
        });


        //Click button "delete spare"
        $('#btnDelSpare').click(function () {
            $('#btnDelSpare').prop("disabled", true);
            let selSpare = $('#spare :selected');
            let numberSelectedSpares = selSpare.length;
            if (numberSelectedSpares === 1) {
                let device_id = $('#device :selected').val();
                let spare_id = selSpare.val();
                deleteSpare(device_id, spare_id);
            }
            // setTimeout(function () {
            //     $('#btnDelSpare').prop("disabled", false);
            // }, 300);
        });


        //Show modal window
        $('#modalWindow').on('show.bs.modal', function (e) {
            let header = e.relatedTarget.dataset.header;
            btnId = e.relatedTarget.id;
            $('.modal-title').text(header);

        });


        //Button "Save" clicked in modal window
        $('#btnModalSave').click(function () {

            let device_id = $('#device').val();
            let newValue = $('#newValue').val();
            let modalWindow = $('#modalWindow');

            switch (btnId) {
                case 'btnAddDevice':
                    addDevice(newValue);
                    modalWindow.modal('toggle');
                    break;
                case 'btnEditDevice':

                    if (newValue) {
                        // let device_id = $('#device').val();
                        updateDevice(device_id, newValue);
                        modalWindow.modal('toggle');
                    }
                    break;

                case 'btnAddBrand':
                    addBrand(newValue);
                    modalWindow.modal('toggle');
                    break;

                case 'btnEditBrand':
                    if (newValue) {
                        let brand_id = $('#brand').val();
                        updateBrand(brand_id, newValue);
                        modalWindow.modal('toggle');
                    }
                    break;

                case 'btnAddModel':
                    // let device_id = $('#device :selected').val();
                    let brand_id = $('#brand :selected').val();
                    addModel(device_id, brand_id, newValue);
                    modalWindow.modal('toggle');
                    break;

                case 'btnEditModel':
                    let model_id = $('#model').val();
                    updateModel(model_id, newValue);
                    modalWindow.modal('toggle');
                    break;

                case 'btnAddSpare':
                    //var device_id = $('#device :selected').val();
                    // console.log(device_id);
                    addSpare(device_id, newValue);
                    modalWindow.modal('toggle');
                    break;

                case 'btnEditSpare':
                    let spare_id = $('#spare').val();
                    updateSpare(spare_id, newValue);
                    modalWindow.modal('toggle');
                    break;
            }

            //Clear text field and close modal window
            btnId = '';
            $('#newValue').val('');
        });


        ///////////////////   Devices   ////////////////////////////////////////////////////////////////////////////////


        //Get all devices
        function getAllDevices() {
            $.ajax({
                url: '/ajax/devices',
                method: 'GET',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (devices) {
                    // console.log(devices);
                    $('#device').empty();

                    for (let key in devices) if (devices.hasOwnProperty(key)) {
                        $('#device').append($('<option value="' + key + '">' + devices[key] + '</option>'));
                    }

                },
                error: function (request, status, error) {
                    errorHandler(request, status, error);
                }
            })
        }


        function addDevice(deviceName) {

            let names = [deviceName];

            $.ajax({
                url: '/ajax/devices',
                method: 'POST',
                data: {
                    devices: names,
                    _token: '{{ csrf_token() }}'
                },
                success: function (result) {
                    if (result) {
                        $('#btnDelDevice').prop('disabled', true);
                        $('#btnEditDevice').prop('disabled', true);
                        getAllDevices();
                    }

                },
                error: function (request, status, error) {
                    errorHandler(request, status, error);
                }
            });

        }


        //Delete selected device
        function deleteSelectedDevice(device_id) {

            devices = [device_id];

            $.ajax({
                url: '/ajax/devices',
                method: 'DELETE',
                data: {
                    devices: devices,
                    _token: '{{ csrf_token() }}'
                },
                success: function (result) {
                    if (result > 0) {
                        getAllDevices();
                        $('#model').empty();
                        $('#spare').empty();
                        $('#btnDelDevice').attr('disabled', true);
                        $('#btnEditDevice').attr('disabled', true);
                        $('#btnAddSpare').attr('disabled', true);
                    }
                },
                error: function (request, status, error) {
                    errorHandler(request, status, error);
                }

            })

        }


        function updateDevice(device_id, new_device_name) {

            $.ajax({
                url: '/ajax/devices',
                method: 'PUT',
                data: {
                    device_id: device_id,
                    device_name: new_device_name,
                    _token: '{{ csrf_token() }}'
                },
                success: function ($result) {
                    if ($result) {
                        $('#device :selected').text(new_device_name);
                    }
                },
                error: function (request, status, error) {
                    errorHandler(request, status, error);
                }
            });
        }


        ///////////////////   Devices   ////////////////////////////////////////////////////////////////////////////////


        ///////////////////   Brands   /////////////////////////////////////////////////////////////////////////////////

        //Add new brand
        function addBrand(brand_name) {

            let names = [brand_name];

            $.ajax({
                url: '/ajax/brands',
                method: 'POST',
                data: {
                    brands: names,
                    _token: '{{ csrf_token() }}'
                },
                success: function (result) {
                    if (result) {
                        $('#btnDelBrand').prop('disabled', true);
                        $('#btnEditBrand').prop('disabled', true);
                        $('#btnAddModel').prop('disabled', true);
                        $('#btnDelModel').prop('disabled', true);
                        $('#btnEditModel').prop('disabled', true);
                        getAllBrands();
                    }
                },
                error: function (request, status, error) {
                    errorHandler(request, status, error);
                }
            });
        }


        function updateBrand(brand_id, new_brand_name) {
            $.ajax({
                url: '/ajax/brands',
                method: 'PUT',
                data: {
                    brand_id: brand_id,
                    brand_name: new_brand_name,
                    _token: '{{ csrf_token() }}'
                },
                success: function ($result) {
                    if ($result) {
                        $('#brand :selected').text(new_brand_name);
                    }
                },
                error: function (request, status, error) {
                    errorHandler(request, status, error);
                }
            });
        }


        //Delete selected brand
        function deleteBrand(brand_id) {

            let brands = [brand_id];

            $.ajax({
                url: '/ajax/brands',
                method: 'DELETE',
                data: {
                    brands: brands,
                    _token: '{{ csrf_token() }}'
                },
                success: function (result) {
                    if (result > 0) {
                        $('#model').empty();
                        $('#btnEditBrand').attr('disabled', true);
                        $('#btnDelBrand').attr('disabled', true);
                        $('#btnAddModel').attr('disabled', true);
                        getAllBrands();
                    }
                },
                error: function (request, status, error) {
                    errorHandler(request, status, error);
                }
            });

        }


        //Get all brands
        function getAllBrands() {
            $.ajax({
                url: '/ajax/brands/',
                method: 'GET',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (brands) {
                    $('#brand').empty();
                    for (let id in brands) if (brands.hasOwnProperty(id)) {
                        $('#brand').append($('<option value="' + id + '">' + brands[id] + '</option>'));
                    }
                },
                error: function (request, status, error) {
                    errorHandler(request, status, error);
                }
            })
        }


        ///////////////////   Brands   /////////////////////////////////////////////////////////////////////////////////


        ///////////////////   Model   //////////////////////////////////////////////////////////////////////////////////


        //Add model by device and brand
        function addModel(device_id, brand_id, new_value) {

            let names = [new_value];

            $.ajax({
                url: '/ajax/models',
                method: 'POST',
                data: {
                    device_id: device_id,
                    brand_id: brand_id,
                    models: names,
                    _token: '{{ csrf_token() }}'
                },
                success: function (result) {
                    if (result) {
                        $('#model').empty();
                        $('#btnDelModel').prop('disabled', true);
                        $('#btnEditModel').prop('disabled', true);
                        getModelsByDeviceAndBrand(device_id, brand_id);
                    }
                },
                error: function (request, status, error) {
                    errorHandler(request, status, error);
                }

            })
        }


        //Update model
        function updateModel(model_id, new_model_name) {
            $.ajax({
                url: '/ajax/models',
                method: 'PUT',
                data: {
                    model_id: model_id,
                    model_name: new_model_name,
                    _token: '{{ csrf_token() }}'
                },
                success: function (result) {
                    if (result) {
                        $('#model').empty();
                        $('#btnEditModel').prop('disabled', true);
                        $('#btnDelModel').prop('disabled', true);
                        device_id = $('#device :selected').val();
                        brand_id = $('#brand :selected').val();
                        getModelsByDeviceAndBrand(device_id, brand_id);

                    }
                },
                error: function (request, status, error) {
                    errorHandler(request, status, error);
                }
            });
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
                    // $('#models').empty();
                    for (let id in models) if (models.hasOwnProperty(id)) {
                        $('#model').append($('<option value="' + id + '">' + models[id] + '</option>'));
                    }

                },
                error: function (request, status, error) {
                    errorHandler(request, status, error);
                }

            })
        }


        //Delete selected model
        function deleteModel(model_id) {

            let models = [model_id];

            // console.log(models);

            $.ajax({
                url: '/ajax/models',
                method: 'DELETE',
                data: {
                    models: models,
                    _token: '{{ csrf_token() }}'
                },
                success: function (result) {
                    if (result > 0) {
                        $('#model').empty();
                        $('#btnEditModel').prop('disabled', true);
                        let device_id = $('#device :selected').val();
                        let brand_id = $('#brand :selected').val();
                        getModelsByDeviceAndBrand(device_id, brand_id);
                    }
                },
                error: function (request, status, error) {
                    errorHandler(request, status, error);
                }
            });

        }


        ///////////////////   Model   //////////////////////////////////////////////////////////////////////////////////


        ///////////////////   Spare   //////////////////////////////////////////////////////////////////////////////////


        //Add spare by device
        function addSpare(device_id, new_value) {

            let names = [new_value];

            // console.log(device_id + ': ' + new_value);

            $.ajax({
                url: '/ajax/spares',
                method: 'POST',
                data: {
                    device_id: device_id,
                    spares: names,
                    _token: '{{ csrf_token() }}'
                },
                success: function (result) {
                    console.log(result);
                    if (result > 0) {
                        $('#spare').empty();
                        getSparesByDevice(device_id);
                    }
                },
                error: function (request, status, error) {
                    errorHandler(request, status, error);
                }

            })
        }


        function updateSpare(spare_id, new_spare_name) {

            $.ajax({
                url: '/ajax/spares',
                method: 'PUT',
                data: {
                    spare_id: spare_id,
                    spare_name: new_spare_name,
                    _token: '{{ csrf_token() }}'
                },
                success: function (result) {
                    if (result) {
                        $('#spare :selected').text(new_spare_name);
                    }
                },
                error: function (request, status, error) {
                    errorHandler(request, status, error);
                }
            });
        }


        //Delete selected spare of the device
        function deleteSpare(device_id, spare_id) {

            let spares = [spare_id];

            console.log(spares);

            $.ajax({
                url: '/ajax/spares',
                method: 'DELETE',
                data: {
                    device_id: device_id,
                    spares: spares,
                    _token: '{{ csrf_token() }}'
                },
                success: function (result) {
                    if (result > 0) {
                        // let device_id = $('#device :selected').val();
                        $('#btnDelSpare').prop('disabled', true);
                        $('#btnEditSpare').prop('disabled', true);
                        getSparesByDevice(device_id);
                    }
                },
                error: function (request, status, error) {
                    errorHandler(request, status, error);
                }
            });

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
                    $('#spare').empty();
                    for (let id in spares) if (spares.hasOwnProperty(id)) {
                        $('#spare').append($('<option value="' + id + '">' + spares[id] + '</option>'));
                    }

                },
                error: function (request, status, error) {
                    errorHandler(request, status, error);
                }
            })
        }


        ///////////////////   Spare   //////////////////////////////////////////////////////////////////////////////////


        function errorHandler(request, status, error) {
            let json = $.parseJSON(request.responseText);
            let err = $('.alert-danger');
            err.html('');
            err.show();
            $.each(json.errors, function (key, value) {
                err.append('<p>' + value + '</p>');
            });
            err.delay(5000).fadeOut();
        }


    </script>
@endsection