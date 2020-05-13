<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
    protected $redirectTo = '/cliente/direccion';

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
        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:75'],
            'ape2' => ['required', 'string', 'max:75'],
            'ape2' => ['required', 'string', 'max:75'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:cliente'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $id = date('d');
        $id = $id . date('m');
        $id = $id . date('y');
        $id = $id . substr($data['telefono'],6,9);
        $id = $id . rand(10,99);

        return User::create([
            'id_cliente'=> $id,
            'nom'=> $data['nom'],
            'ape1'=> $data['ape1'],
            'ape2'=> $data['ape2'],
            'email'=> $data['email'],
            'telefono'=> $data['telefono'],
            'fech_na'=> '2020/02/10',
            'password'=> Hash::make($data['password'])
        ]);
        
 /*
        return User::create([
            'nom' => $data['nom'],
            'ape1' => 'Jimenez',
            'ape2' => 'Hernandez',
            'telefono' => '5532313305',
            'email' => $data['email'],
            'fech_na' => '2020/04/01'            
        ]);   
        
        */
    }
}
