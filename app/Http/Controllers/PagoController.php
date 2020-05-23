<?php

namespace App\Http\Controllers;

use App\Pago;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagoController extends Controller
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
        
        $data = $request->except('_token');
        $id = rand(10000000000,99999999999);
        $id_cli = auth()->user()->id_cliente;
        $dia = date("y-m-d");
        $total =  $request->total;
        $si = $this->validate($request, [
            'tarjeta' => ['required',],
            'direccion' => ['required'],
        ]);
        $ya=0;
        
        if($si){
            $count = DB::select('SELECT COUNT(*) as cu from carrito where `id_cliente` = ?', [$id_cli]);
            foreach($count as $value){
                $num = $value->cu;
            }
            if($num > 0){
       $ras = rand(1000000000,99999999999);
                if($ya == 0){
       DB::table('transporte')->insert(
        [
            'id_trans' => '09364763', 
            'nom' => 'DHL', 
            'telefono' => '5543123322', 
            'num_rast'=> $ras
             ]
         );

         DB::table('pedido')->insert(
             [
                 'id_pedido' => $id, 
                 'id_cliente' =>$id_cli, 
                 'id_trans' => '09364763', 
                 'id_tarj' => $data['tarjeta'], 
                 'fech_pe' => $dia, 
                 'total' => $total
             ]
         );  $ya = 1;
        }
            $count = DB::select('SELECT * from carrito where `id_cliente` = ?', [$id_cli]);
            foreach($count as $value){
                $idpru = $value->id_produc;
                $can = $value->cantidad;
                $pre = DB::select('SELECT prec_uni from stock where `id_produc` = ?', [$idpru]);
                foreach($pre as $value){
                    $precio = $value->prec_uni;
                 DB::table('deta_comp')->insert(
                     [
                         'id_produc' => $idpru, 
                         'id_pedido' => $id, 
                         'cantidad' => $can, 
                         'precio_uni' => $precio, 
                     ]
                 );
                }
                DB::table('carrito')->where('id_cliente', '=', $id_cli)->delete();
            }

        return redirect()->route('verped');
        }
        else{
            return redirect()->back()->withErrors(['cantidadCar' => 'No tiene nada en el carrito'])->withInput();
        }
    }else{
        return redirect()->back()->withErrors(['tarjeta' => 'Seleciona una tarjeta','direccion'=>'Seleccione una direccion'])->withInput();
    }

        //return redirect()->route('index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
        //
    }
}
