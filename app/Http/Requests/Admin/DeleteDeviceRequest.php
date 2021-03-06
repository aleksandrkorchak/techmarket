<?php

namespace App\Http\Requests\Admin;

use App\Rules\IntegerOrArray;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class DeleteDeviceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        if (Gate::allows('edit-settings')) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'devices' => ['required', 'array'],
            'devices.*' => ['required', 'integer', 'exists:devices,id']
        ];
    }
}
