<?php

namespace App\Http\Controllers;

use App\Direccion;
use Illuminate\Http\Request;
use App\Http\Requests\direcRequ;
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
    public function store(direcRequ $request)
    {
        //
        $direccion = $request->except('_token');
        $date = date("dmy");
        $rand = rand(100, 999);
        $id = "di-" . $date . $rand;
        $id_cli =  auth()->user()->id_cliente;

        DB::table('direccion')->insert([
            'id_direc' => $id,
            'alias' => $direccion['alias'],
            'id_estado' => $direccion['estado'],
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
        if (isset($direccion['create'])) {
            return redirect('cliente/direcciones');
        } else {
            return redirect('cliente/Tarjetas');
        }
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
        $direccion = $request->except('_token');
        $id_cli =  auth()->user()->id_cliente;

        DB::table('direccion')
            ->where('id_direc', $direccion['id'])
            ->update([
                'alias' => $direccion['alias'],
                'id_estado' => $direccion['estado'],
                'ciudad' => $direccion['ciudad'],
                'calle' => $direccion['calle'],
                'numero' => $direccion['NumEI'],
                'colonia' => $direccion['colonia'],
                'cp' => $direccion['CP'],
                'muni_dele' => $direccion['MuDe']
            ]);
        return redirect('cliente/direcciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $id_cli =  auth()->user()->id_cliente;
        DB::table('direc_cliente')->where('id_direc', '=', $id)->where('id_cliente', '=', $id_cli)->delete();
        DB::table('direccion')->where('id_direc', '=', $id)->delete();
        return redirect('cliente/direcciones');
    }
}
