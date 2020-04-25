<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Auth;



class LoginController extends Controller
{

    public function __construct(){
        $this->middleware('guest',['only'=>'showLoginFrom']);
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(){
        $credencial = $this->validate(request(),[
            'email' => 'email|required|string',
            'password' => 'required|string '
        ]);
            
       if (Auth::attempt($credencial)){
           return 'Hola amigo';
       }
      
           return back()->withErrors(['email' => 'El correo como la contraseña estan erroneos, verifique que los datos sean correctos']);
       
    }
}
