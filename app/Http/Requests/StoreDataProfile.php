<?php

namespace App\Http\Requests;

use const http\Client\Curl\AUTH_ANY;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class StoreDataProfile extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function rules(Request $request)
    {
        $data = $request->all();
        $user = Auth::user();

        return [

            'name' => ['nullable', 'alpha', 'min:2', 'max:30'],
            'surname' => ['nullable', 'alpha', 'min:2', 'max:30'],
            'login' => ['required', 'alpha_dash', 'min:4', 'max:20', Rule::unique('users')->ignore($user->id)],
            'new_pass' => ['nullable', 'alpha_dash', 'min:8', 'max:30'],
//            'old_pass' => ['required', 'alpha_dash', 'min:8', 'max:30', function ($attribute, $value, $fail) use ($user){
//                if (! Hash::check($value, $user->password)) {
//                    $fail('Пароль неверный. Параметры профиля не сохранены');
//                }
//            }],
            'email' => ['nullable', 'email', 'min:3', 'max:30',
                Rule::unique('users')->ignore($user->id),
                Rule::requiredIf($user->role_id == '2' || $user->role_id == '3'),
            ],
            'phone' => ['required', 'digits_between:5,15'],
            'city' => ['required', 'alpha', 'min:3', 'max:30'],

            'organization' => ['bail', 'string', 'min:1', 'max:100',
                Rule::requiredIf($user->role_id == 2 || $user->role_id == 3),
            ],

//            'occupation' => ['bail', 'required', 'numeric', 'exists:occupations,id',
//                Rule::in(Occupation::pluck('id')),
//                Rule::requiredIf($data['role'] == 2),
//            ],
//            'devices' => ['array'],
//            'devices.*' => ['bail', 'numeric', 'exists:devices,id',
//                Rule::in(Device::pluck('id')),
//                Rule::requiredIf($data['role'] == 2),
//            ],
        ];
    }
}
