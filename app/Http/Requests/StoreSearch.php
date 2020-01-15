<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreSearch extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {


        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            //TODO: Проверить существует ли заданная модель по типу устройства и его марке
//            'device' => ['bail', 'required', 'numeric', 'exists:devices,id'],
//            'brand' => ['bail', 'required_with_all:device', 'numeric', 'exists:brands,id'],
//            'model' => ['bail', 'required_with_all:device,brand', 'numeric', 'exists:models,id'],
//            'spare' => ['bail', 'required_with_all:device,brand,model', 'numeric', 'exists:spares,id'],
//            'state' => ['bail', 'required', 'numeric', 'exists:states,id'],
//            'quality' => ['bail', 'required', 'numeric', 'exists:qualities,id'],
//            'wait' => ['bail', 'required', 'numeric', 'exists:waits,id'],
            //TODO: Проверить и удалить из комментария ссылки на другие сайты
            'comment' => ['nullable', 'string'],

        ];
    }
}
