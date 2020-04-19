<?php

namespace App\Http\Controllers;

use App\CreateUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\DB;


class CreateUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('RegistroUser');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
    /**
     * Creamos la instancia de la clase registro
     */
    $registro = new CreateUser;

    /* Realizamos la asignación masiva */
    $registro->nom = $request['name'];
    $registro->ape1 = $request['pa'];
    $registro->ape2 = $request['sa'];
    $registro->email = $request['email'];
 
   
    /**
     * Se repite con los demás datos que desees asignar...
     */

    $registro->save();

    return "Usuario registrado";



        
        //  $usuario= new CreateUser;
        //  request()->except('_token');
        //  $usuario->nombre=$request->input('name');
        //  $usuario->email=$request->input('email');
        //  $usuario->password=$request->input('password');

     

        // DB::insert('insert INTO cliente (nom,email) values ("Antonio","Antonio@mail.com")');

           //  DB::table('cliente')->insert( ['nom' => $usuario->nombre, 'email' => $usuario->email]);
     

        //    $discussion = CreateUser::create($request->all());
        //    return response()->json($discussion);
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CreateUser  $createUser
     * @return \Illuminate\Http\Response
     */
    public function show(CreateUser $createUser)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CreateUser  $createUser
     * @return \Illuminate\Http\Response
     */
    public function edit(CreateUser $createUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CreateUser  $createUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CreateUser $createUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CreateUser  $createUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreateUser $createUser)
    {
        //
    }
}
