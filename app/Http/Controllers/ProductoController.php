<?php

namespace App\Http\Controllers;

use App\producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use BD;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = DB::table('proveedor')
            ->get();
        $familias = DB::table('familia')
            ->get();
        $claves = DB::table('claves')
            ->get();




        return view('admin.producto.index')->with('proveedor', $proveedores)->with('familia', $familias)->with('clave', $claves);
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
        $datos = $request->except('_token');

        $id = substr($datos['id_provee'], 0, 6);
        $id = $id . substr($datos['id_familia'], 6, 8);


        //6 primeros caracteres -> Los primeros 6 caracteres de el ID de provedor
        // 3 sigueintes letras -> las 3 ultimas letras de la familia
        // 3 SIGUIENTES DIGITOS  CAMBIAN POR 5 EN SUBMODELOS EJ: 000,005,0010 
        // SI ES EL MISMO SUBMODELO, PERO TIENE ALGUNA CARACTERISTICA DIFERENTE.



        DB::table('producto')->insert([
            'id_produc' => $id,
            'id_provee' => $datos['id_provee'],
            'id_familia' => $datos['id_familia'],
            'titutlo' => $datos['titulo'],
            'datos' => $datos['datos'],
            'clav_clas' => $datos['clav_clas']

        ]);


        //       DB::table('proveedor')->insert([
        //         'id_provee'=> $datos['id_provee']
        //        ]);


        //       DB::table('stock')->insert([
        //        'id_produc'=> $datos['id_produc']
        //       ]);

        //       DB::table('claves')->insert([
        //        'id_clav'=> $datos['clav_clas']
        //       ]);


        //       DB::table('deta_comp')->insert([
        //        'id_produc'=> $datos['id_produc']
        //       ]);

        //       DB::table('comentario')->insert([
        //        'id_produc'=> $datos['id_produc']
        //       ]);

        //       DB::table('buscador')->insert([
        //        'id_produc'=> $datos['id_produc']
        //       ]);

        //       DB::table('contenido')->insert([
        //        'id_produc'=> $datos['id_produc']
        //       ]);

        //       DB::table('oferta')->insert([
        //        'id_produc'=> $datos['id_produc']
        //       ]);



        return redirect('/actualizarproducto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(producto $producto)
    {

        // $productos = DB::table('producto')
        // ->get();
        // $proveedores = DB::table('proveedor')
        // ->get();
        // $familias = DB::table('familia')
        // ->get();
        // $claves = DB::table('claves')
        // ->get();

        $resultados = DB::select('SELECT familia.nom_fami, claves.name,proveedor.nom,producto.titutlo,producto.datos,producto.id_produc
        FROM ((producto
        INNER JOIN familia ON familia.id_familia = producto.id_familia)
        INNER JOIN claves ON claves.id_clav=producto.clav_clas
        INNER JOIN proveedor ON proveedor.id_provee = producto.id_provee)');

        $proveedores = DB::table('proveedor')
        ->get();
        $familias = DB::table('familia')
        ->get();
        $claves = DB::table('claves')
        ->get();



        return view('admin.producto.cambios-baja.actualizarp')->with('resultado', $resultados)->with('proveedor', $proveedores)->with('familia', $familias)->with('clave', $claves);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, producto $producto)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(producto $producto)
    {
        //
    }
}
