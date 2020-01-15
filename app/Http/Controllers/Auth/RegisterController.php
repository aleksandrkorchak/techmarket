<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\User;
use App\Seller;
use App\Device;
use App\Occupation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Show the application registration form.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(Request $request)
    {

        $currentRoute = $request->route()->getName();

//        dd(Occupation::pluck('id'));

        if ($currentRoute === 'register.seller') {
            $occupations = Occupation::pluck('name', 'id');
            $categories = Device::pluck('category', 'id');
//            dd($arr);
            return view('auth.register-seller', ['occupations' => $occupations, 'categories' => $categories]);
        }

        return view('auth.register');
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        //TODO: Сделать подтверждение регистрации пользователя по email

        $validator = $this->validator($request->all());
        $validator->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

//        dd($data);


        //TODO: Возможна двойная отправка формы: иногда вылазит ошибка 419 - устаревший токен,
        // а иногда ошибка sql при попытке добавления двух одинаковых пользователей
        return Validator::make($data, [
            'role' => ['bail', 'required', 'numeric', Rule::in([1, 2])],
            'login' => ['required', 'alpha_dash', 'min:4', 'max:20', 'unique:users,login'],
            'password' => ['required', 'alpha_dash', 'min:8', 'max:30'],
            'email' => ['bail', 'nullable', 'email', 'min:3', 'max:30', 'unique:users,email',
                Rule::requiredIf($data['role'] == '2'),
            ],
            'phone' => ['required', 'digits_between:5,15'],
            'city' => ['required', 'alpha', 'min:3', 'max:30'],
            'agreement' => ['accepted'],
            'organization' => ['bail', 'string', 'min:1', 'max:100',
                Rule::requiredIf($data['role'] == 2),
            ],
            'occupation' => ['bail', 'numeric', 'exists:occupations,id',
                Rule::in(Occupation::pluck('id')),
                Rule::requiredIf($data['role'] == 2),
            ],
            'devices' => ['array'],
            'devices.*' => ['bail', 'numeric', 'exists:devices,id',
                Rule::in(Device::pluck('id')),
                Rule::requiredIf($data['role'] == 2),
            ],

            'captcha' => ['required', 'captcha'],
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $fields = array();

        $fields['role_id'] = $data['role'];
        $fields['login'] = $data['login'];
        $fields['password'] = Hash::make($data['password']);
        $fields['email'] = $data['email'];
        if (isset($data['email'])) {
            $fields['email'] = $data['email'];
        }
        $fields['phone'] = $data['phone'];
        $fields['city'] = $data['city'];

        $user = User::create($fields);

        if ($data['role'] == 2) {
            $seller = new Seller([
                'organization' => $data['organization'],
                'occupation_id' => $data['occupation']
            ]);
            $user->seller()->save($seller);

            $seller->devices()->attach($data['devices']);
        }

        return $user;
    }


    protected function redirectTo()
    {
        return route('show.profile', ['user_id' => Auth::id()]);
    }

}
