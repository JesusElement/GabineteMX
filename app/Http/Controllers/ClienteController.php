<?php

namespace App\Http\Controllers;

use App\cliente;
use App\contra;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('cliente.RegistroUser');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cliente.CreateUser');
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
        /*$datos = $request->all();
        return response()->json($datos);*/

        $datos = $request ->except('_token');
       /* cliente::create([
            'nom'=> $datos['nom'],
            'ape1'=> $datos['ape1'],
            'ape2'=> $datos['ape2'],
            'email'=> $datos['email'],
            'telefono'=> $datos['telefono'],
            'fech_na'=> '2020/02/10'
        ]);*/

        $id = date('d');
        $id = $id . substr($datos['nom'],0,1);
        $id = $id . substr($datos['ape1'],0,1);
        $id = $id . substr($datos['ape2'],0,1);
        $id = $id . substr($datos['telefono'],6,9);
        $id = $id . rand(100,999);

        DB::table('cliente')->insert([
            'id_cliente'=> $id,
            'nom'=> $datos['nom'],
            'ape1'=> $datos['ape1'],
            'ape2'=> $datos['ape2'],
            'email'=> $datos['email'],
            'telefono'=> $datos['telefono'],
            'fech_na'=> '2020/02/10'
        ]);
        
        $contra = password_hash($datos['contra'], PASSWORD_DEFAULT);

        DB::table('contraseña')->insert([
            'id_cliente'=> $id,
            'contra'=> $contra,
            'clave'=> '00aa0033'

        ]);
        return response()->json($datos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(cliente $cliente)
    {
        //
    }
}
