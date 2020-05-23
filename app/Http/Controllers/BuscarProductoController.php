<?php

namespace App\Http\Controllers;

use App\BuscarProducto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use BD;
use App\Http\Controllers\Session;
use Hamcrest\Core\HasToString;
use App\Http\Controllers\Input;
use Symfony\Component\Console\Input\Input as InputInput;

class BuscarProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recibir(Request $request)
    {
        $name = $request->search;
        // echo "Esto es del REQUEST:"; var_dump($name);
        $FueFamilia = DB::table('familia')
            ->select('familia.nom_fami')
            ->where('familia.nom_fami', 'like', '%' . $name . '%')
            ->get();

        $FueMarca = DB::table('proveedor')
            ->select('proveedor.nom')
            ->where('proveedor.nom', 'like', '%' . $name . '%')
            ->get();

        $resultadosNomFa = DB::table('producto')
            ->join('familia', 'familia.id_familia', '=', 'producto.id_familia')
            ->join('claves', 'claves.id_clav', '=', 'producto.clav_clas')
            ->join('proveedor', 'proveedor.id_provee', '=', 'producto.id_provee')
            ->join('stock', 'stock.id_produc', '=', 'producto.id_produc')
            ->select('familia.nom_fami', 'claves.name', 'proveedor.nom', 'producto.titulo', 'producto.datos', 'producto.id_provee', 'producto.id_familia', 'producto.id_produc', 'stock.stock', 'stock.prec_uni')
            ->where('familia.nom_fami', $name)
            ->orderBy('nom_fami', 'asc')
            ->paginate(20);

        $resultadosNomMar = DB::table('producto')
            ->join('familia', 'familia.id_familia', '=', 'producto.id_familia')
            ->join('claves', 'claves.id_clav', '=', 'producto.clav_clas')
            ->join('proveedor', 'proveedor.id_provee', '=', 'producto.id_provee')
            ->join('stock', 'stock.id_produc', '=', 'producto.id_produc')
            ->select('familia.nom_fami', 'claves.name', 'proveedor.nom', 'producto.titulo', 'producto.datos', 'producto.id_provee', 'producto.id_familia', 'producto.id_produc', 'stock.stock', 'stock.prec_uni')
            ->where('proveedor.nom', $name)
            ->orderBy('nom_fami', 'asc')
            ->paginate(20);





        $Marcas = DB::table('proveedor')
            ->join('producto', 'producto.id_provee', '=', 'proveedor.id_provee')
            ->join('familia', 'familia.id_familia', '=', 'producto.id_familia')
            ->select('proveedor.nom')
            ->distinct()
            ->where('familia.nom_fami', $name)->get();

        $ProductosMarcaFamilia = DB::table('producto')
            ->join('familia', 'familia.id_familia', '=', 'producto.id_familia')
            ->join('claves', 'claves.id_clav', '=', 'producto.clav_clas')
            ->join('proveedor', 'proveedor.id_provee', '=', 'producto.id_provee')
            ->join('stock', 'stock.id_produc', '=', 'producto.id_produc')
            ->select('familia.nom_fami', 'claves.name', 'proveedor.nom', 'producto.titulo', 'producto.datos', 'producto.id_provee', 'producto.id_familia', 'producto.id_produc', 'stock.stock', 'stock.prec_uni')
            ->where('familia.nom_fami', 'like', '%' . $name . '%')
            ->paginate(20);

        $ProductosMarcaFamilia = DB::table('producto')
            ->join('familia', 'familia.id_familia', '=', 'producto.id_familia')
            ->join('claves', 'claves.id_clav', '=', 'producto.clav_clas')
            ->join('proveedor', 'proveedor.id_provee', '=', 'producto.id_provee')
            ->join('stock', 'stock.id_produc', '=', 'producto.id_produc')
            ->select('familia.nom_fami', 'claves.name', 'proveedor.nom', 'producto.titulo', 'producto.datos', 'producto.id_provee', 'producto.id_familia', 'producto.id_produc', 'stock.stock', 'stock.prec_uni')
            ->where('proveedor.nom', 'like', '%' . $name . '%')
            ->paginate(20);

        $FamiliaCategoria = DB::table('familia')
            ->join('producto', 'familia.id_familia', 'producto.id_familia')
            ->join('proveedor', 'proveedor.id_provee', 'producto.id_provee')
            ->select('familia.nom_fami')
            ->distinct()
            ->where('proveedor.nom', 'like', '%' . $name . '%')
            ->get();

        $CategoriaFamilia = DB::table('familia')
            ->select('familia.nom_fami')
            ->where('familia.nom_fami', $name)
            ->get();





        return view('cliente.producto.buscarproducto')
            ->with('resultadoFAM', $resultadosNomFa)
            ->with('resultadoMAR', $resultadosNomMar)
            ->with('Categoria', $FamiliaCategoria)
            ->with('Marca', $Marcas)
            ->with('productoFamProv', $ProductosMarcaFamilia)
            ->with('quefamilia', $FueFamilia)
            ->with('quemarca', $FueMarca);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param  \App\BuscarProducto  $buscarProducto
     * @return \Illuminate\Http\Response
     */
    public function show(BuscarProducto $buscarProducto, $search = null)
    {
        //  $P = $buscarProducto->Familia;
        //  $M = $buscarProducto->Prodcuto;
        //  $A = $buscarProducto->b;
        // var_dump($P);
        // var_dump($M);
        //Dado que no encontre como mandar dos datos a un controlador
        //laraVel tome la desición de mejor hacer  un explode para 
        //optener la cadena de datos. El siguiente codigo sirve para tal 
        //proposito


        //var_dump($search);
        $A = explode("-", $search);
        //echo"<br>Esto es A0 (FAMILIAS): ";  var_dump($A[0]);
        if (isset($A[0])) {
            if (isset($A[1])) {
                //   echo"<br>Esto es A1 (MARCAS): ";   var_dump($A[1]);    
            } else {
                $A[1] = "nada";
                // var_dump($A[1]);
            }
        }


        $FueFamilia = DB::table('familia')
            ->select('familia.nom_fami')
            ->where('familia.nom_fami', $A[0])
            ->get();

        $FueMarca = DB::table('proveedor')
            ->select('proveedor.nom')
            ->where('proveedor.nom', $A[0])
            ->get();


        $resultadosNomFa = DB::table('producto')
            ->join('familia', 'familia.id_familia', '=', 'producto.id_familia')
            ->join('claves', 'claves.id_clav', '=', 'producto.clav_clas')
            ->join('proveedor', 'proveedor.id_provee', '=', 'producto.id_provee')
            ->join('stock', 'stock.id_produc', '=', 'producto.id_produc')
            ->select('familia.nom_fami', 'claves.name', 'proveedor.nom', 'producto.titulo', 'producto.datos', 'producto.id_provee', 'producto.id_familia', 'producto.id_produc', 'stock.stock', 'stock.prec_uni')
            ->where('familia.nom_fami', $A[0])
            ->orderBy('nom_fami', 'asc')
            ->paginate(20);

        $resultadosNomMar = DB::table('producto')
            ->join('familia', 'familia.id_familia', '=', 'producto.id_familia')
            ->join('claves', 'claves.id_clav', '=', 'producto.clav_clas')
            ->join('proveedor', 'proveedor.id_provee', '=', 'producto.id_provee')
            ->join('stock', 'stock.id_produc', '=', 'producto.id_produc')
            ->select('familia.nom_fami', 'claves.name', 'proveedor.nom', 'producto.titulo', 'producto.datos', 'producto.id_provee', 'producto.id_familia', 'producto.id_produc', 'stock.stock', 'stock.prec_uni')
            ->where('proveedor.nom', $A[0])
            ->orderBy('nom_fami', 'asc')
            ->paginate(20);



        $proveedores = DB::table('proveedor')
            ->get();

        $familias = DB::table('familia')
            ->get();

        $claves = DB::table('claves')
            ->get();

        $productos = DB::table('producto')
            ->get();

        $Marcas = DB::table('proveedor')
            ->join('producto', 'producto.id_provee', '=', 'proveedor.id_provee')
            ->join('familia', 'familia.id_familia', '=', 'producto.id_familia')
            ->select('proveedor.nom')
            ->distinct()
            ->where('familia.nom_fami', $A[0])->get();

        $FamiliaCategoria = DB::table('familia')
            ->select('familia.nom_fami')
            ->where('familia.nom_fami', $A[0])
            ->get();

        $buscarFam = DB::table('familia')
            ->join('producto', 'producto.id_familia', '=', 'familia.id_familia')
            ->join('proveedor', 'proveedor.id_provee', '=', 'producto.id_provee')
            ->select('nom_fami')
            ->where('proveedor.nom', $A[1])
            ->get();

        $ProductosMarcaFamilia = DB::table('producto')
            ->join('familia', 'familia.id_familia', '=', 'producto.id_familia')
            ->join('claves', 'claves.id_clav', '=', 'producto.clav_clas')
            ->join('proveedor', 'proveedor.id_provee', '=', 'producto.id_provee')
            ->join('stock', 'stock.id_produc', '=', 'producto.id_produc')
            ->select('familia.nom_fami', 'claves.name', 'proveedor.nom', 'producto.titulo', 'producto.datos', 'producto.id_provee', 'producto.id_familia', 'producto.id_produc', 'stock.stock', 'stock.prec_uni')
            ->where('familia.nom_fami', $A[0])
            ->where('proveedor.nom', $A[1])
            ->paginate(20);




        $BuscoFamilia = DB::table('producto')
            ->join('familia', 'familia.id_familia', '=', 'producto.id_familia')
            ->join('claves', 'claves.id_clav', '=', 'producto.clav_clas')
            ->join('proveedor', 'proveedor.id_provee', '=', 'producto.id_provee')
            ->join('stock', 'stock.id_produc', '=', 'producto.id_produc')
            ->select('familia.nom_fami', 'claves.name', 'proveedor.nom', 'producto.titulo', 'producto.datos', 'producto.id_provee', 'producto.id_familia', 'producto.id_produc', 'stock.stock', 'stock.prec_uni')
            ->orwhere('familia.nom_fami', 'like', '%' . $A[0] . '%')
            ->get();





        return view('cliente.producto.buscarproducto')
            ->with('resultadoFAM', $resultadosNomFa)
            ->with('resultadoMAR', $resultadosNomMar)
            ->with('proveedor', $proveedores)
            ->with('familia', $familias)
            ->with('BuscoPorFam', $BuscoFamilia)
            ->with('fam', $buscarFam)
            ->with('clave', $claves)
            ->with('Marca', $Marcas)
            ->with('producto', $productos)
            ->with('productoFamProv', $ProductosMarcaFamilia)
            ->with('Categoria', $FamiliaCategoria)
            ->with('quefamilia', $FueFamilia)
            ->with('quemarca', $FueMarca);
    }



    //  /**
    //      * Show the form for search productings.
    //      *
    //      * @param  \App\BuscarProducto  $buscarProducto
    //      * @return \Illuminate\Http\Response
    //      */
    //     public function search(BuscarProducto $buscarProducto)
    //     {
    //        $data = $buscarProducto -> input();
    //         print_r($data);

    //         return view('cliente.producto.buscarproducto');
    //     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BuscarProducto  $buscarProducto
     * @return \Illuminate\Http\Response
     */
    public function edit(BuscarProducto $buscarProducto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BuscarProducto  $buscarProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BuscarProducto $buscarProducto)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BuscarProducto  $buscarProducto
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuscarProducto $buscarProducto)
    {
       
    }
}
