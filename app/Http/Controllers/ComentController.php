<?php

namespace App\Http\Controllers;

use App\coment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComentController extends Controller
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
        $dia = date("y-m-d");
        $prod = $request->producto;
        $idc = auth()->user()->id_cliente;
        $data = $request->except('_token');

        $validar = DB::select('SELECT COUNT(*) AS num FROM comentario WHERE id_produc= ? && id_cliente = ? ', [$prod, $idc]);
        foreach ($validar as $value) {
            $si = $value->num;
        }
        if ($si == 0) {
            DB::table('comentario')->insert([
                'id_cliente' => $idc,
                'id_produc' => $prod,
                'coment' => $data['coment'],
                'star' => $data['estrellas'],
                'fecha_c' => $dia
            ]);
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors(['coment' => 'Solo se puede agregar un comentario por producto'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\coment  $coment
     * @return \Illuminate\Http\Response
     */
    public function show(coment $coment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\coment  $coment
     * @return \Illuminate\Http\Response
     */
    public function edit(coment $coment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\coment  $coment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coment $coment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\coment  $coment
     * @return \Illuminate\Http\Response
     */
    public function destroy(coment $coment)
    {
        //
    }
}
