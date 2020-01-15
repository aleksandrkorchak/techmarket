<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;
use App\Device;
use App\Model;
use App\Spare;
use App\Library\Captcha;
use Illuminate\Support\Facades\Session;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Contracts\Encryption\Encrypter;

class TestController extends Controller
{


    public function addSpares()
    {

        $names = ['qqqqqqqqq', 'wwwwwwwwwww', 'eeeeeeeeeeee', 'rrrrrrrrr'];


        $device = Device::find(1);

        $data = [];

        foreach ($names as $name) {
            $data[] = ['name' => $name];
        }

        $arr = [$data];

        $result = $device->spares()->createMany($data);
//        dd($result);

        dd(count($result));

//        $result = Spare::insert($data);

        //$brands contain true or false
//        return response()->json($result);
    }


//    public function deleteSpares()
//    {
//
//        $spares = [1,2];
//
//        $result = Spare::destroy($spares);
//
//        //return the number of deleted models
//        dd($result);
//    }


//    public function deleteBrands()
//    {
//
//       $brands = [16];
//
//        $result = Brand::destroy($brands);
////
//        dd($result);
//    }

//    public function getAllDevices()
//    {
//        $devices = Device::pluck('name', 'id');
//
//        dd( $devices);
//    }
//
//
//    public function getModelsByDeviceAndBrand()
//    {
//
////        $models = Model::where('device_id', $request->device_id)->where('brand_id', $request->brand_id)->pluck('name', 'id');
////
////        return response()->json($models);
//
//
//        $device_id = 1;
//        $brand_id = 1;
//
//        $models = Model::where('device_id', $device_id)->where('brand_id', $brand_id)->pluck('name', 'id');
//
//        dd($models);
//
//    }
//
//
//
//    public function deleteDevice($id)
//    {
//
//        dd(Device::destroy($id));
//
//    }


//    /**
//     * The encrypter implementation.
//     *
//     * @var \Illuminate\Contracts\Encryption\Encrypter
//     */
//    protected $encrypter;
//
//
//    /**
//     * Determine if the session and input CSRF tokens match.
//     *
//     * @param  \Illuminate\Http\Request $request
//     * @return bool
//     */
//    protected function tokensMatch($request)
//    {
//        $token = $this->getTokenFromRequest($request);
//
//        return is_string($request->session()->token()) &&
//            is_string($token) &&
//            hash_equals($request->session()->token(), $token);
//    }
//
//    /**
//     * Get the CSRF token from the request.
//     *
//     * @param  \Illuminate\Http\Request $request
//     * @return string
//     */
//    public function getTokenFromRequest(Request $request)
//    {
//        dd($request->header('X-CSRF-TOKEN'));
//        $token = $request->input('_token') ?: $request->header('X-CSRF-TOKEN');
//
//        if (!$token && $header = $request->header('X-XSRF-TOKEN')) {
//            $token = $this->encrypter->decrypt($header, static::serialized());
//        }
//
//        return $token;
//    }
//
//    /**
//     * Determine if the cookie contents should be serialized.
//     *
//     * @return bool
//     */
//    public static function serialized()
//    {
//        return EncryptCookies::serialized('XSRF-TOKEN');
//    }
//
//    public function getCaptcha(Request $request)
//    {
//
//        $this->getTokenFromRequest($request);
//
//
////        print_r( Captcha::createSimpleCaptcha());
////        dd(Session::all());
//    }
//
//
//
//
//
//    public function getDevices()
//    {
//        $devices = Device::pluck('name', 'id');
//
//        dd($devices);
//
//        return $devices;
//    }
//
//
//    public function getBrands($device_id)
//    {
////        $model = Device::where('name', $device_name)->first();
////        if (empty($model)) {
////            return [];
////        }
////
////        dd($model->brands);
////
////        $brands = $model->brands->unique()->pluck('name')->all() ?? null;
////
////
////        return $brands;
//
//
//        dump($device_id);
//        $device = Device::find($device_id);
////        dd($device);
//        if (empty($device)) {
//            return [];
//        }
//
//        //Get array of the brands
////        $brands = $device->brands->unique()->pluck('name', 'id')->all();
////        $brands = $device->brands()->unique()->pluck('name', 'id')->all();
////        $brands = $device->brands()->where('brands.name', $request->brand_name)->get();
//        $brands = $device->brands->unique()->pluck('name', 'id');
//
//        dd($brands);
//    }
//
//
//    public function getModels(string $device_id, string $brand_id)
//    {
////        //Get device by name
////        $device = Device::where('name', $device_name)->first();
////        if (empty($device)) {
////            return [];
////        }
//////        dd($device);
////
////        //Get brands for current device
////        $brands = $device->brands()->where('brands.name', $brand_name)->get();
//////        dd($brands);
////
////        //Get list models names for current device and brand
////        $models_name = array();
////        foreach ($brands as $brand) {
////            $models_name[] = $brand->model->name;
////        }
////
////        return $models_name;
//
//        //Get device by id
//        $device = Device::find($device_id);
//        if (empty($device)) {
//            return [];
//        }
//
//        //Get brands for current device
//        $brands = $device->brands()->where('brands.id', $brand_id)->get();
////        dd($brands);
//
//        //Get list models name for current device and brand
//        $models = array();
//        foreach ($brands as $brand) {
////            dump($brand->model->id);
//            $models[$brand->model->id] = $brand->model->name;
//        }
//
//        dd($models);
//
////        return $models_name;
//
//
////        dd($models_name);
//
////        $devices = Device::with('brands')->get();
////        dump($devices->flatMap);
////        foreach ($devices->flatMap->brands as $brand) {
////            echo $brand->model->name . '<br>';
////        }
//
////        foreach ($device->brands as $brand) {
////            echo $brand->model->name . '<br>';
////        }
//
//    }
//
//
//    public function getSpares($device_id, $brand_id, $model_id)
//    {
////        $device_name = 'Смартфон';
////        $brand_name = 'Apple';
////        $model_name = 'iPhone 6 32GB Gold (MQ3E2)';
////
////        //Get device id by device name
////        $device_id = Device::where('name', $device_name)->value('id');
//////        dump($device_id);
////
////        //Get brand id by brand name
////        $brand_id = Brand::where('name', $brand_name)->value('id');
//////        dd($brand_id);
////
////        //Get model by name
////        $model = Model::where([
////            ['name', $model_name],
////            ['device_id', $device_id],
////            ['brand_id', $brand_id]
////        ])->first();
//////        dd($model);
////
////        //Get spares for current [model,brand,device]
//////        $spares = $model->spares->pluck('name')->all();
//////        dd($spares);
////
////        $spares = $model->spares->load('color');
//
//
//        //Check device ID exists
//
////        dd(Device::find($device_id));
//        if (empty(Device::find($device_id))) {
//            return [];
//        }
//
//        //Check brand ID exists
//        if (empty(Brand::find($brand_id))) {
//            return [];
//        }
//
//        //Check the model with (model id, device id, brand id)
//        $model = Model::where([
//            ['id', $model_id],
//            ['device_id', $device_id],
//            ['brand_id', $brand_id]
//        ])->first();
//        if (empty($model)) {
//            return [];
//        }
//
//        //Get spares for current (model,brand,device)
//        $spares = $model->spares->load('color');
//
//        return $spares->toArray();
//
//
////        foreach ($spares as $spare) {
//////             dump($spare);
////            echo $spare->color->name . '<br>';
////        }
//
//
//        //        $testarr = [
////            0 => [
////                "id" => 1,
////                "name" => "Антенна WiFi",
////                "code" => "anph6wf",
////                "color_id" => 1,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 1
////                ],
////                "color" => [
////                    "id" => 1,
////                    "name" => ""
////                ]
////            ],
////            1 => [
////                "id" => 2,
////                "name" => "Вибро (вибромотор)",
////                "code" => "vph6",
////                "color_id" => 1,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 2
////                ],
////                "color" => [
////                    "id" => 1,
////                    "name" => ""
////                ]
////            ],
////            2 => [
////                "id" => 3,
////                "name" => "Кнопка Home",
////                "code" => "fph6hbb",
////                "color_id" => 3,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 3
////                ],
////                "color" => [
////                    "id" => 3,
////                    "name" => "черный"
////                ]
////            ],
////            3 => [
////                "id" => 4,
////                "name" => "Кнопка Home",
////                "code" => "fph6hbw",
////                "color_id" => 2,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 4
////                ],
////                "color" => [
////                    "id" => 2,
////                    "name" => "белый"
////                ]
////            ],
////            4 => [
////                "id" => 5,
////                "name" => "Кнопка Home",
////                "code" => "fph6hbgo",
////                "color_id" => 4,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 5
////                ],
////                "color" => [
////                    "id" => 4,
////                    "name" => "золотой"
////                ]
////            ],
////            5 => [
////                "id" => 6,
////                "name" => "Наружная кнопка home",
////                "code" => "hbph6w",
////                "color_id" => 2,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 6
////                ],
////                "color" => [
////                    "id" => 2,
////                    "name" => "белый"
////                ]
////            ],
////            6 => [
////                "id" => 7,
////                "name" => "Наружная кнопка home",
////                "code" => "hbph6go",
////                "color_id" => 4,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 7
////                ],
////                "color" => [
////                    "id" => 4,
////                    "name" => "золотой"
////                ]
////            ],
////            7 => [
////                "id" => 8,
////                "name" => "Корпус",
////                "code" => "hph6w",
////                "color_id" => 2,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 8
////                ],
////                "color" => [
////                    "id" => 2,
////                    "name" => "белый"
////                ]
////            ],
////            8 => [
////                "id" => 9,
////                "name" => "Корпус",
////                "code" => "hph6gr",
////                "color_id" => 6,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 9
////                ],
////                "color" => [
////                    "id" => 6,
////                    "name" => "серый"
////                ]
////            ],
////            9 => [
////                "id" => 10,
////                "name" => "Корпус",
////                "code" => "hph6go",
////                "color_id" => 4,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 10
////                ],
////                "color" => [
////                    "id" => 4,
////                    "name" => "золотой"
////                ]
////            ],
////            10 => [
////                "id" => 11,
////                "name" => "Дисплей с тачскрином в сборе",
////                "code" => "lcdph6whc",
////                "color_id" => 2,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 11,
////                ],
////                "color" => [
////                    "id" => 2,
////                    "name" => "белый"
////                ]
////            ],
////            11 => [
////                "id" => 12,
////                "name" => "Дисплей с тачскрином в сборе",
////                "code" => "lcdph6bo",
////                "color_id" => 3,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 12
////                ],
////                "color" => [
////                    "id" => 3,
////                    "name" => "черный"
////                ]
////            ],
////            12 => [
////                "id" => 13,
////                "name" => "Рамка дисплея (экрана)",
////                "code" => "frph6w",
////                "color_id" => 2,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 13,
////                ],
////                "color" => [
////                    "id" => 2,
////                    "name" => "белый"
////                ]
////            ],
////            13 => [
////                "id" => 14,
////                "name" => "Аккумулятор мощность 6,91 ватт-час",
////                "code" => "akumph6o",
////                "color_id" => 1,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 14
////                ],
////                "color" => [
////                    "id" => 1,
////                    "name" => ""
////                ]
////            ],
////            14 => [
////                "id" => 15,
////                "name" => "Стекло",
////                "code" => "ulph6w",
////                "color_id" => 2,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 15,
////                ],
////                "color" => [
////                    "id" => 2,
////                    "name" => "белый"
////                ]
////            ],
////            15 => [
////                "id" => 16,
////                "name" => "Стекло с рамкой",
////                "code" => "lph6fb",
////                "color_id" => 3,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 16
////                ],
////                "color" => [
////                    "id" => 3,
////                    "name" => "черный"
////                ]
////            ],
////            16 => [
////                "id" => 17,
////                "name" => "Стекло с рамкой",
////                "code" => "lph6fw",
////                "color_id" => 2,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 17
////                ],
////                "color" => [
////                    "id" => 2,
////                    "name" => "белый"
////                ]
////            ],
////            17 => [
////                "id" => 18,
////                "name" => "Шлейф с разъемом зарядки и гарнитуры",
////                "code" => "chfph6g",
////                "color_id" => 6,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 18
////                ],
////                "color" => [
////                    "id" => 6,
////                    "name" => "серый"
////                ]
////            ],
////            18 => [
////                "id" => 19,
////                "name" => "Шлейф с разъемом зарядки и гарнитуры",
////                "code" => "chfph6ghc",
////                "color_id" => 6,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 19
////                ],
////                "color" => [
////                    "id" => 6,
////                    "name" => "серый"
////                ]
////            ],
////            19 => [
////                "id" => 20,
////                "name" => "Шлейф с кнопками включения, вспышкой и микрофоном",
////                "code" => "fph6onoff",
////                "color_id" => 1,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 20
////                ],
////                "color" => [
////                    "id" => 1,
////                    "name" => ""
////                ]
////            ],
////            20 => [
////                "id" => 21,
////                "name" => "Шлейф с кнопками громкости и вибро",
////                "code" => "fph6v",
////                "color_id" => 1,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 21
////                ],
////                "color" => [
////                    "id" => 1,
////                    "name" => ""
////                ]
////            ],
////            21 => [
////                "id" => 22,
////                "name" => "Шлейф с датчиком освещенности, датчиком приближения и фронтальной камерой",
////                "code" => "fph6cam",
////                "color_id" => 1,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 22
////                ],
////                "color" => [
////                    "id" => 1,
////                    "name" => ""
////                ]
////            ],
////            22 => [
////                "id" => 23,
////                "name" => "Шлейф для тестирования (проверки) модульных дисплеев модулей",
////                "code" => "fph6t",
////                "color_id" => 1,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 23
////                ],
////                "color" => [
////                    "id" => 1,
////                    "name" => ""
////                ]
////            ],
////            23 => [
////                "id" => 24,
////                "name" => "Основная (задняя) камера",
////                "code" => "camph6b",
////                "color_id" => 1,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 24
////                ],
////                "color" => [
////                    "id" => 1,
////                    "name" => ""
////                ]
////            ],
////            24 => [
////                "id" => 25,
////                "name" => "Слуховой динамик для",
////                "code" => "spph6",
////                "color_id" => 1,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 25
////                ],
////                "color" => [
////                    "id" => 1,
////                    "name" => ""
////                ]
////            ],
////            25 => [
////                "id" => 26,
////                "name" => "Тачскрин",
////                "code" => "tph6b",
////                "color_id" => 3,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 26
////                ],
////                "color" => [
////                    "id" => 3,
////                    "name" => "черный"
////                ]
////            ],
////            26 => [
////                "id" => 27,
////                "name" => "Набор винтов",
////                "code" => "nvph6go",
////                "color_id" => 4,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 27
////                ],
////                "color" => [
////                    "id" => 4,
////                    "name" => "золотой"
////                ]
////            ],
////            27 => [
////                "id" => 28,
////                "name" => "Полифонический динамик",
////                "code" => "bph6",
////                "color_id" => 1,
////                "pivot" => [
////                    "model_id" => 23,
////                    "spare_id" => 28
////                ],
////                "color" => [
////                    "id" => 1,
////                    "name" => ""
////                ]
////            ]
////        ];
////
////        return $testarr;
//
//
//        print_r($spares->toArray());
//
////        return $spares;
//    }


}
