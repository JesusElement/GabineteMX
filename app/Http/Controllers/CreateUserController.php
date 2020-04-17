<?php

namespace App\Http\Controllers;

use App\CreateUser;
use Illuminate\Http\Request;

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
        //
        $datosUsuario=request()->all();
        return response()->json($datosUsuario);
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
