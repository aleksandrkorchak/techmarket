<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class AddSparesRequest extends FormRequest
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
            'device_id' => ['required', 'integer', 'exists:devices,id'],
            'spares' => ['required', 'array'],
            'spares.*' => ['required', 'alpha_dash', 'min:2', 'max:30', 'unique:spares,name']
        ];
    }
}
