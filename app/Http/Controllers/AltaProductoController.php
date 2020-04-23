<?php

namespace App\Http\Controllers;

use App\AltaProducto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use BD;

class AltaProductoController extends Controller
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
    return view('admin.AltaProducto')->with('proveedor', $proveedores);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
             

        $datos = $request ->except('_token');

   
 
         DB::table('producto')->insert([
             'id_produc'=> $datos['id_produc'],
             'id_provee'=> $datos['id_provee'],
             'titulo'=> $datos['titulo'],
             'datos'=> $datos['datos'],
             'clav_clas'=> $datos['clav_clas']
           
         ]);
         
         
               DB::table('proveedor')->insert([
                 'id_provee'=> $datos['id_provee']
                ]);
        
    
               DB::table('stock')->insert([
                'id_produc'=> $datos['id_produc']
               ]);

               DB::table('claves')->insert([
                'id_clav'=> $datos['clav_clas']
               ]);

            
               DB::table('deta_comp')->insert([
                'id_produc'=> $datos['id_produc']
               ]);

               DB::table('comentario')->insert([
                'id_produc'=> $datos['id_produc']
               ]);

               DB::table('buscador')->insert([
                'id_produc'=> $datos['id_produc']
               ]);

               DB::table('contenido')->insert([
                'id_produc'=> $datos['id_produc']
               ]);

               DB::table('oferta')->insert([
                'id_produc'=> $datos['id_produc']
               ]);




           
               return redirect()->back()->with('alert', $datos);







    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AltaProducto  $altaProducto
     * @return \Illuminate\Http\Response
     */
    public function show(AltaProducto $altaProducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AltaProducto  $altaProducto
     * @return \Illuminate\Http\Response
     */
    public function edit(AltaProducto $altaProducto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AltaProducto  $altaProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AltaProducto $altaProducto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AltaProducto  $altaProducto
     * @return \Illuminate\Http\Response
     */
    public function destroy(AltaProducto $altaProducto)
    {
        //
    }
}
