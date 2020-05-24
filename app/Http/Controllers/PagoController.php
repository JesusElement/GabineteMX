<?php

namespace App\Http\Controllers;

use App\Pago;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

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

    public function printPDF($folio)
    {

        $user = auth()->user()->id_cliente;
        $id_pedido = $folio;

        $direc = DB::select('SELECT a.id_pedido, a.total, b.nom, a.num_rast FROM pedido as a, transporte as b WHERE b.id_trans = a.id_trans && a.id_cliente = ? && a.id_pedido = ?', [$user,$id_pedido]);
        foreach($direc as $value){
               $folio = $value->id_pedido;
               $total= $value->total;
               $trans = $value->nom;
               $ras = $value->num_rast;
        }
        $direcc = DB::select('SELECT b.*, c.estado FROM direc_cliente as a, direccion as b, estado as c WHERE a.id_direc = b.id_direc && c.id_estado = b.id_estado && a.id_cliente = ?', [$user]);
                    foreach($direcc as $value){
                           $alias = $value->alias;
                           $direccion = $value->calle." ".$value->numero." ".$value->colonia;
                    }

            $data = [          
               
                'folio' => $folio,          
                'total' => $total,          
                'transporte' => $trans,
                'ras' => $ras,
                'lugar'=>$alias,
                'direccion'=>$direccion
            
            ];
        
        $pdf = PDF::loadView('cliente.factura.index', $data);  
        return $pdf->download('Comprobante.pdf');
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
         DB::table('pedido')->insert(
             [
                 'id_pedido' => $id, 
                 'id_cliente' =>$id_cli, 
                 'id_trans' => '09364763', 
                 'id_tarj' => $data['tarjeta'], 
                 'fech_pe' => $dia, 
                 'num_rast' => $ras,
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

        return redirect('cliente/pedidos');
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