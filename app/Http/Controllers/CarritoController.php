<?php

namespace App\Http\Controllers;

use App\carrito;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use BD;
use Carbon\Carbon;
use App\Http\Controllers\Session;
use Hamcrest\Core\HasToString;
use App\Http\Controllers\Input;
use PhpParser\Node\Stmt\Foreach_;
use Symfony\Component\Console\Input\Input as InputInput;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

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
    public function store(Request $request, $Producto)
    {

        //var_dump($Producto);
        $id  =  auth()->user()->id_cliente;
        $Id_Pro = $Producto;

        $YastexisteC = DB::table('carrito')
            ->select('*')
            ->where('carrito.id_produc', $Id_Pro)
            ->where('carrito.id_cliente', $id)->get();

        // var_dump($YastexisteC);
        //    !empty($YastexisteC)



        if ($YastexisteC->isEmpty()) {


            $fechaPrimera = Carbon::now()->toDateString('Y-m-d');
            //var_dump($fechaPrimera);
            $fechaSegunda = Carbon::now()->addDay(7)->toDateString('Y-m-d');
            //var_dump($fechaSegunda);
            $Uno = 1;
            DB::table('carrito')->insert(
                [
                    'id_cliente' => $id,
                    'id_produc' => $Id_Pro,
                    'cantidad' => $Uno,
                    'fecha_in' => $fechaPrimera,
                    'fecha_ter' => $fechaSegunda
                ]
            );
        } else {
            // var_dump($YastexisteC);

            foreach ($YastexisteC as $cuantos) {
                $num = $cuantos->cantidad;
            }

            $num = $num + 1;
            DB::table('carrito')
                ->where('carrito.id_produc', $Id_Pro)
                ->where('carrito.id_cliente', $id)
                ->update([
                    'cantidad' => $num,
                ]);
        }


        $TodosCarrtios = DB::table('cliente')
            ->select('cliente.id_cliente', 'cliente.nom')
            ->where('cliente.id_cliente', $id)
            ->get();

        // return view('cliente.carrito.index');
        // ->with('Carrito',$TodosCarrtios);



        sleep(1);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function show(carrito $carrito)
    {
        $id  =  auth()->user()->id_cliente;
        //var_dump($id);
        // Get the currently authenticated user's ID...

        /*** SELECT car.id_produc, car.id_cliente, p.titulo, p.id_provee, fa.nom_fami, prov.nom, sk.stock, sk.prec_uni
FROM producto as p 
INNER JOIN carrito as car on p.id_produc = car.id_produc 
INNER JOIN cliente as cli on cli.id_cliente = car.id_cliente 
INNER JOIN familia as fa on fa.id_familia = p.id_familia
INNER JOIN proveedor as prov on prov.id_provee = p.id_provee
INNER JOIN stock as sk on sk.id_produc = p.id_produc*/

        //SELECT id_produc, COUNT(id_produc) as Np FROM carrito WHERE id_cliente = '260420323111' GROUP BY id_produc
        // $IdProducCount = DB::table('carrito')
        // ->select('carrito.id_produc')
        // ->where('carrito.id_cliente', $id)
        // ->groupBy('id_produc')
        // ->addSelect(DB::raw('count(carrito.id_produc) as Np'))->get();



        $CarritoCliente = DB::table('producto')
            ->join('carrito', 'carrito.id_produc', '=', 'producto.id_produc')
            ->join('cliente', 'cliente.id_cliente', '=', 'carrito.id_cliente')
            ->join('familia', 'familia.id_familia', '=', 'producto.id_familia')
            ->join('proveedor', 'proveedor.id_provee', '=', 'producto.id_provee')
            ->join('stock', 'stock.id_produc', '=', 'producto.id_produc')
            ->select('carrito.id_produc', 'carrito.id_cliente', 'carrito.cantidad', 'producto.titulo', 'producto.id_provee', 'familia.nom_fami', 'proveedor.nom', 'stock.stock', 'stock.prec_uni')
            ->where('carrito.id_cliente', $id)
            ->distinct()->get();

        $direccion = DB::table('direccion')
            ->join('estado', 'estado.id_estado', 'direccion.id_estado')
            ->join('direc_cliente', 'direc_cliente.id_direc', 'direccion.id_direc')
            ->select('direccion.calle', 'estado.estado', 'direccion.numero', 'direccion.id_direc', 'direccion.colonia', 'direccion.alias', 'direccion.*')
            ->where('direc_cliente.id_cliente', $id)->get();
        // var_dump($direccion);




        // $user = auth()->user()->id_cliente;
        // $creditcard = DB::select('SELECT * FROM `cli_m_pago` WHERE id_cliente = ?', [$user]);
        // foreach ($creditcard as $value) {
        //     $card = $value->num_tar;
        //     $nom = $value->nom_card;
        //     $expi = $value->expi;
        //     $id = $value->id_pago;
        //     $id = ($id * 263412432) / 2;
        //     $key = "Una oracion al santro padre 3425ytsdfhvbdfs ";
        //     list($encrypted_data, $iv) = explode('::', base64_decode($card), 2);
        //     $valor = openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
        //     $real = substr($valor, 14, 16);
        // }


        return view('cliente.carrito.index')
            ->with('Carrito', $CarritoCliente)
            ->with('dir', $direccion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function edit(carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, carrito $carrito)
    {

        /* ------- No lo usare dado que no se que quiere hacer el cliente aun ------- */
    }

    public function Menos(Request $request, $Menos)
    {
        $id  =  auth()->user()->id_cliente;
        $Id_Pro = $Menos;

        $YastexisteC = DB::table('carrito')
            ->select('cantidad')
            ->where('carrito.id_produc', $Id_Pro)
            ->where('carrito.id_cliente', $id)->get();

        foreach ($YastexisteC as $cantidad) {
            $son = $cantidad->cantidad;
        }

        if ($son == 1) {
            DB::table('carrito')->where('id_produc', '=', $Id_Pro, 'AND', 'id_cliente', '=', $id)->delete();
            return redirect('carrito');
        }

        $num = $son - 1;
        DB::table('carrito')
            ->where('carrito.id_produc', $Id_Pro)
            ->where('carrito.id_cliente', $id)
            ->update([
                'cantidad' => $num,
            ]);
        return redirect('carrito');
    }

    public function Mas(Request $request, $Mas)
    {

        $id  =  auth()->user()->id_cliente;
        $Id_Pro = $Mas;

        $YastexisteC = DB::table('carrito')
            ->select('cantidad')
            ->where('carrito.id_produc', $Id_Pro)
            ->where('carrito.id_cliente', $id)->get();

        foreach ($YastexisteC as $cantidad) {
            $son = $cantidad->cantidad;
        }


        $num = $son + 1;
        DB::table('carrito')
            ->where('carrito.id_produc', $Id_Pro)
            ->where('carrito.id_cliente', $id)
            ->update([
                'cantidad' => $num,
            ]);
        return redirect('carrito');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function destroy(carrito $carrito, $Eli)
    {
        $id  =  auth()->user()->id_cliente;
        $id_ProE = $Eli;
        DB::table('carrito')->where('id_produc', '=', $id_ProE, 'AND', 'id_cliente', '=', $id)->delete();
        return redirect('carrito');
    }


}
