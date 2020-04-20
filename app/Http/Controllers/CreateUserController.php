<?php

namespace App\Http\Controllers;

use App\CreateUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;


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
        return view('RegistroUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
 
    // $nom=$request['name'];
    // $password=bcrypt($request['password']);
    // $email=$request['email'];
    // $ape1=$request['pa'];
    // $ape2=$request['sa'];

    // $usuario = new CreateUser();

    // $usuario->nom = $nom;
    // $usuario->ape1 = $ape1;
    // $usuario->ape2 = $ape2;
    // $usuario->email = $email;
    // $usuario->save();
    // return redirect()->back();

 
   
    

     $datos=request()->except('_token');
    //  return response()->json($datos);

    CreateUser::insert($datos);


    

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
