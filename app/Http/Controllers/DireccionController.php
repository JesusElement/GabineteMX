<?php

namespace App\Http\Controllers;

use App\Direccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $direccion = $request->except('_token');
        $date = date("dmy");
        $rand = rand(100,999);
        $id = "di-".$date.$rand;
        $id_cli =  auth()->user()->id_cliente;

        DB::table('direccion')->insert([
            'id_direc' => $id,
            'alias' => $direccion['alias'],
            'id_estado'=> $direccion['estado'],
            'ciudad' => $direccion['ciudad'],
            'calle' => $direccion['calle'],
            'numero' => $direccion['NumEI'],
            'colonia' => $direccion['colonia'],
            'cp' => $direccion['CP'],
            'muni_dele' => $direccion['MuDe']
        ]);
        DB::table('direc_cliente')->insert([
            'id_direc' => $id,
            'id_cliente' => $id_cli
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function show(Direccion $direccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Direccion $direccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Direccion $direccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Direccion $direccion)
    {
        //
    }
}
