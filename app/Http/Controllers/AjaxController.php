<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Requests\Admin\AddDeviceRequest;
use App\Http\Requests\Admin\AddSparesRequest;
use App\Http\Requests\Admin\DeleteDeviceRequest;
use App\Http\Requests\Admin\DeleteSparesRequest;
use App\Http\Requests\Admin\UpdateDeviceRequest;
use App\Http\Requests\Admin\UpdateModelRequest;
use App\Http\Requests\Admin\UpdateSpareRequest;
use App\Http\Requests\CatalogRequest;
use App\Http\Requests\GetModelsByDeviceAndBrandRequest;
use App\Http\Requests\GetSparesByDeviceRequest;
use App\Http\Requests\ModelsRequest;
use App\Http\Requests\SparesRequest;
use App\Model;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Device;
use App\Spare;
use App\Http\Requests\DevicesRequest;
use App\Http\Requests\Admin\AddBrandsRequest;
use App\Http\Requests\Admin\AddModelsRequest;
use App\Http\Requests\Admin\UpdateBrandRequest;
use App\Http\Requests\Admin\DeleteBrandsRequest;
use App\Http\Requests\Admin\DeleteModelsRequest;


class AjaxController extends Controller
{


    public function deleteNotification(Request $request)
    {

        $result = Notification::destroy($request->id);

        return $result;

    }


    public function setReadNotification(Request $request)
    {
        $result = Notification::find($request->id)->update(['read_at' => now()]);

        return response()->json($result);
    }


//////////////  Devices  ///////////////////////////////////////////////////////////////////////////////////////////////

    public function getAllDevices()
    {
        $devices = Device::pluck('name', 'id');

        return $devices;
    }

//TODO: Необходимо помнить, что удаление, добавление и изменение доступны только для администратора


    public function addDevices(DevicesRequest $request)
    {

        //devices array example
//        $data = [
//            ['name' => 'NewDevice3'],
//            ['name' => 'NewDevice4']
//        ];
//        return $data;

        $data = [];

        foreach ($request->devices as $device_name) {
            $data[] = ['name' => $device_name];
        }

        $devices = Device::insert($data);

        return response()->json($devices);
    }


    public function updateDevice(UpdateDeviceRequest $request)
    {
        $device = Device::find($request->device_id);
        $device->name = $request->device_name;
        $result = $device->save();

        return response()->json($result);

//        return response()->json([
//            'success' => $result
//        ]);
    }


    public function deleteDevices(DeleteDeviceRequest $request)
    {
        $result = Device::destroy($request->devices);

        return $result;
    }



//////////////  Devices  ///////////////////////////////////////////////////////////////////////////////////////////////


//////////////  Brands  ////////////////////////////////////////////////////////////////////////////////////////////////


    public function getAllBrands()
    {
        $brands = Brand::pluck('name', 'id');

        return $brands;
    }


    /**
     * @param AddBrandsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addBrands(AddBrandsRequest $request)
    {
        $data = [];

        foreach ($request->brands as $brand_name) {
            $data[] = ['name' => $brand_name];
        }

        $brands = Brand::insert($data);

        //$brands contain true or false
        return response()->json($brands);
    }


    public function updateBrand(UpdateBrandRequest $request)
    {
        $brand = Brand::find($request->brand_id);
        $brand->name = $request->brand_name;
        $result = $brand->save();

        //return true or false
        return response()->json($result);
    }


    public function deleteBrands(DeleteBrandsRequest $request)
    {

        $result = Brand::destroy($request->brands);

        //return the number of deleted brands
        return $result;
    }


//////////////  Brands  ////////////////////////////////////////////////////////////////////////////////////////////////


//////////////  Models  ////////////////////////////////////////////////////////////////////////////////////////////////


    public function getModelsByDeviceAndBrand(GetModelsByDeviceAndBrandRequest $request)
    {
        $models = Model::where('device_id', $request->device_id)->where('brand_id', $request->brand_id)->pluck('name', 'id');

        return $models;
    }


    public function addModels(AddModelsRequest $request)
    {

        $data = [];

        foreach ($request->models as $model_name) {
            $data[] = [
                'name' => $model_name,
                'device_id' => $request->device_id,
                'brand_id' => $request->brand_id
            ];
        }

        $result = Model::insert($data);

        //$brands contain true or false
        return response()->json($result);
    }


    public function updateModel(UpdateModelRequest $request)
    {
        $model = Model::find($request->model_id);
        $model->name = $request->model_name;
        $result = $model->save();

//        //return true or false
        return response()->json($result);
    }


    public function deleteModels(DeleteModelsRequest $request)
    {

        $result = Model::destroy($request->models);

        //return the number of deleted models
        return $result;
    }



//////////////  Models  ////////////////////////////////////////////////////////////////////////////////////////////////


//////////////  Spares  ////////////////////////////////////////////////////////////////////////////////////////////////


    public function getSparesByDevice(GetSparesByDeviceRequest $request)
    {
        //Check device ID exists
        $device = Device::find($request->device_id);

        return $device->spares->pluck('name', 'id');
    }


    public function addSpares(AddSparesRequest $request)
    {

        $device = Device::find($request->device_id);

        $data = [];

        foreach ($request->spares as $spare_name) {
            $data[] = ['name' => $spare_name];
        }

        $result = $device->spares()->createMany($data);
        $count = count($result);

        //$count contain number of inserted records
        return response()->json($count);
    }


    public function updateSpare(UpdateSpareRequest $request)
    {

        $spare = Spare::find($request->spare_id);
        $spare->name = $request->spare_name;
        $result = $spare->save();

        //return true or false
        return response()->json($result);
    }


    /**
     * @param DeleteSparesRequest $request
     * @return int
     */
    public function deleteSpares(DeleteSparesRequest $request)
    {

        $device = Device::find($request->device_id);

        $result = $device->spares()->detach($request->spares);

//        $result = Spare::destroy($request->spares);

        //return the number of deleted spares
        return $result;
    }


//////////////  Spares  ////////////////////////////////////////////////////////////////////////////////////////////////


}
