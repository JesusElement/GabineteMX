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
        // ALTA DE LA PROMOCION
        $datos = $request->except('_token');
      
         
     
      
        $c = "PRO";
        $cuatro=0000;
        $id = $c;
        $id = $id . substr($datos['id_p'], 6, 8);
        $id=$id.$cuatro;
        $id = $id . rand(30, 99);


         DB::table('oferta')->insert([
             'id_oferta' => $id,
             'id_produc' => $datos['id_p'],
             'fech_ini' => $datos['fech_ini'],
             'hora_ini' => $datos['hora_ini'],
             'fech_ter' => $datos['fech_ter'],
             'hora_ter' => $datos['hora_ter'],
             'desc' => $datos['desc']

     ]);


        // return response()->json($datos);
        return redirect()->back()->with('alertalta', 'alta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function show(Promocion $promocion)
    {
        /*
      SELECT oferta.id_oferta,oferta.id_produc,producto.titulo,oferta.fech_ini,oferta.hora_ini,oferta.fech_ter,oferta.hora_ter,oferta.desc,familia.nom_fami,proveedor.nom,stock.prec_uni,
        round(stock.prec_uni-(stock.prec_uni * oferta.desc/100),2) AS prec_final
                FROM ((oferta
                 INNER JOIN producto ON producto.id_produc = oferta.id_produc)
                 INNER JOIN familia ON familia.id_familia=producto.id_familia
                 INNER JOIN stock on stock.id_produc=oferta.id_produc
                 INNER JOIN proveedor ON proveedor.id_provee = producto.id_provee) ORDER BY producto.titulo ASC

        */


        $resultados=DB::table('oferta')
        ->join('producto', 'producto.id_produc', '=', 'oferta.id_produc')
        ->join('familia', 'familia.id_familia', '=', 'producto.id_familia')
        ->join('proveedor', 'proveedor.id_provee', '=', 'producto.id_provee')
        ->join('stock', 'stock.id_produc', '=', 'oferta.id_produc')
        ->select('oferta.id_oferta','producto.id_produc','producto.titulo','oferta.fech_ini','oferta.hora_ini','oferta.fech_ter','oferta.hora_ter','oferta.desc','familia.nom_fami','proveedor.nom','stock.prec_uni'
        ,DB::raw('round(stock.prec_uni-(stock.prec_uni * oferta.desc/100),2) as prec_final'))
        ->orderBy('producto.titulo', 'asc')
        ->paginate(20);

       /*
        SELECT producto.titulo,producto.id_produc
        FROM producto
        WHERE producto.id_produc NOT IN (SELECT oferta.id_produc FROM oferta)

        */

        $productos=DB::table('producto')
        ->select('producto.titulo','producto.id_produc')
        ->whereNotIn('producto.id_produc', DB::table('oferta')->select('oferta.id_produc'))
        ->orderBy('producto.titulo', 'asc')
        ->get();


       
        
         return view('admin.producto.promocion.index')->with('resultado', $resultados)->with('producto', $productos);
       
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
    public function update(Request $request,$promocion){
        
        $datos = $request->except('_token');
      

        DB::table('oferta')
        ->where('id_oferta','=',$promocion)
        ->update([

            'id_produc'=>$datos['id_p'],
            'fech_ini' => $datos['fech_ini'],
            'hora_ini' => $datos['hora_ini'],
            'fech_ter' => $datos['fech_ter'],
            'hora_ter' => $datos['hora_ter'],
            'desc' => $datos['desc']
        ]);

        
        return redirect()->back()->with('alertact', 'actualizacion');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function destroy($promocion)
    {
        DB::table('oferta')->where('id_produc', '=', $promocion)->delete();


        return redirect()->back()->with('alertbaja', 'baja');
    }


  
}
