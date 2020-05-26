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
            'nom' => ['required', 'string', 'max:75','min:3'],
            'ape1' => ['required', 'string', 'max:75'],
            'ape2' => ['required', 'string', 'max:75'],
            'telefono' => ['required', 'numeric', 'min:10'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:cliente'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[
            'nom.required' => 'El campo de nombre esta vacio',
            'nom.max' => 'El maximo perdimitido es de 75 caraxteres',
            'nom.min' => 'El minimo perdimitido es de 3 caraxteres',
            'ape1.required'=> 'El campo de primer apellido esta vacio',
            'ape1.max' => 'El maximo perdimitido es de 75 caraxteres',
            'ape2.required'=> 'El campo de segundo apellido esta vacio',
            'ape2.max' => 'El maximo perdimitido es de 75 caraxteres',
            'telefono.required'=> 'El campo de telefono esta vacio',
            'telefono.numeric' => 'El telefono solo puedens er numeros',
            'email.required'=> 'El campo de email esta vacio',
            'email.email' => 'El correo electronico no tiene el formato adecuado',
            'email.max' => 'El correo debe de tener como maximo 100 caracteres',
            'password.required'=> 'El campo de segundo apellido esta vacio',
            'password.min' => 'La contraseña debe tener como minimo 8 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',
        ]   
    );
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
