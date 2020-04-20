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
        DB::table('cliente')->insert([
            'id_cliente'=>'1',
            'nom'=>'Antonio',
            'ape1'=>'Hernandez',
            'ape2'=>'Oropeza',
            'email'=>'antonioher@gmail.com',
            'telefono'=>'55004879',
            'fech_na'=>'1998/10/04',
            'rfc'=>'xxxxxxxx'
        ]);
    
 
        

    

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
