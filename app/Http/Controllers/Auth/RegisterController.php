<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\FormPassword;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $password = FormPassword::where('id', 1)->get()->first()->password;
        $password_b = FormPassword::where('id', 1)->get()->first()->password_b;
        $validator = Validator::make($data, [
            'company_name' => ['required', 'string', 'max:255'],
            'belong' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'form_password' => ['required']
        ]);
        if(!Hash::check($data['form_password'], $password) && !Hash::check($data['form_password'], $password_b)){
            $validator->after(function($validator)
            {
                $validator->errors()->add('form_password', 'フォーム登録用パスワードが正しくありません。');
            });
        }
        return $validator;

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $password = FormPassword::where('id', 1)->get()->first()->password;
        if(Hash::check($data['form_password'], $password)){
            return User::create([
                'company_name' => $data['company_name'],
                'belong' => $data['belong'],
                'username' => $data['username'],
                'address' => $data['address'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'account_type' => 'A'
            ]);
        }

        return User::create([
            'company_name' => $data['company_name'],
            'belong' => $data['belong'],
            'username' => $data['username'],
            'address' => $data['address'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'account_type' => 'B',
            'b_date' => date('Y-m-d', strtotime('+30 days'))
        ]);
    }
}
