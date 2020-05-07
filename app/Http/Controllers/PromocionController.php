<?php

namespace App\Http\Controllers;

use App\Promocion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use BD;
use App\Http\Controllers\Session;
use Exception;
use Hamcrest\Core\HasToString;
use App\Http\Controllers\Input;
use Symfony\Component\Console\Input\Input as InputInput;

class PromocionController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function show(Promocion $promocion)
    {

        // SELECT oferta.id_oferta,oferta.id_produc,producto.titulo,oferta.fech_ini,oferta.hora_ini,oferta.fech_ter,oferta.hora_ter,oferta.desc,familia.nom_fami,proveedor.nom
        // FROM ((oferta
        // INNER JOIN producto ON producto.id_produc = oferta.id_produc)
        // INNER JOIN familia ON familia.id_familia=producto.id_familia
        // INNER JOIN proveedor ON proveedor.id_provee = producto.id_provee)


        $resultados=DB::table('oferta')
        ->join('producto', 'producto.id_produc', '=', 'oferta.id_produc')
        ->join('familia', 'familia.id_familia', '=', 'producto.id_familia')
        ->join('proveedor', 'proveedor.id_provee', '=', 'producto.id_provee')
        ->select('oferta.id_oferta','producto.id_produc','producto.titulo','oferta.fech_ini','oferta.hora_ini','oferta.fech_ter','oferta.hora_ter','oferta.desc','familia.nom_fami','proveedor.nom')
        ->orderBy('producto.titulo', 'asc')
        ->paginate(20);

        // $proveedores = DB::table('proveedor')
        //     ->get();
        // $familias = DB::table('familia')
        //     ->get();
        // $claves = DB::table('claves')
        //     ->get();
        // $productos = DB::table('producto')
        //     ->get();



        return view('admin.producto.promocion.index')->with('resultado', $resultados);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promocion $promocion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promocion $promocion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promocion $promocion)
    {
        //
    }


    public function infoproducto(Promocion $promocion){



    }
}
