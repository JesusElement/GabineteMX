<?php

namespace App\Http\Controllers;

use App\producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use BD;
use App\Http\Controllers\Session;
use Hamcrest\Core\HasToString;
use App\Http\Controllers\Input;
use Exception;
use Symfony\Component\Console\Input\Input as InputInput;

class ProductoController extends Controller
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

        $c = 0;
        $id = substr($datos['id_provee'], 0, 6);
        $id = $id . substr($datos['id_familia'], 6, 8);
        $id = $id . $c;
        $id = $id . rand(30, 99);


        //6 primeros caracteres -> Los primeros 6 caracteres de el ID de provedor
        // 3 sigueintes letras -> las 3 ultimas letras de la familia
        // 3 SIGUIENTES DIGITOS  CAMBIAN POR 5 EN SUBMODELOS EJ: 000,005,0010 
        // SI ES EL MISMO SUBMODELO, PERO TIENE ALGUNA CARACTERISTICA DIFERENTE.

        $ceros = 00000;
        $id_conte = substr($datos['id_familia'], 6, 8);
        $id_conte = $id_conte . $ceros;
        $id_conte = $id_conte . substr($id, 10, 11);


        // INSERTAR LA IMAGEN A LA RUTA CORRESPONDIENTE

        $nomproveedor = DB::table('proveedor')
            ->where('id_provee', $datos['id_provee'])
            ->first();
        $nomfamilia = DB::table('familia')
            ->where('id_familia', $datos['id_familia'])
            ->first();

        if ($request->hasFile('imagen')) {

            $image_name = $request->file('imagen')->getClientOriginalName();
            $image_ext = $request->file('imagen')->getClientOriginalExtension();
            $path = "Imagenes/Productos/$nomfamilia->nom_fami/$nomproveedor->nom/$id";


            $imgnomfin = $id . rand(0, 99) . ".";


            try {
                $request->file('imagen')->move(public_path($path), $image_name);
            } catch (Exception $e) {
                echo "Entra en catch";
            }
        } else {
            echo "Entra en else";
        }



        try {
            //code...
            DB::table('producto')->insert([
                'id_produc' => $id,
                'id_provee' => $datos['id_provee'],
                'id_familia' => $datos['id_familia'],
                'titulo' => $datos['titulo'],
                'datos' => $datos['datos'],
                'clav_clas' => $datos['clav_clas']

            ]);

            DB::table('stock')->insert([
                'id_produc' => $id,
                'stock' => $datos['stock'],
                'prec_uni' => $datos['prec_uni']

            ]);

            DB::table('contenido')->insert([
                'id_conte' => $id_conte,
                'id_produc' => $id,
                'ruta' => $path,
                'tip_arch' => $image_ext

            ]);
        } catch (\Throwable $th) {
            $c = 0;
            $id = substr($datos['id_provee'], 0, 6);
            $id = $id . substr($datos['id_familia'], 6, 8);
            $id = $id . $c;
            $id = $id . rand(30, 99);

            DB::table('producto')->insert([
                'id_produc' => $id,
                'id_provee' => $datos['id_provee'],
                'id_familia' => $datos['id_familia'],
                'titulo' => $datos['titulo'],
                'datos' => $datos['datos'],
                'clav_clas' => $datos['clav_clas']

            ]);

            DB::table('stock')->insert([
                'id_produc' => $id,
                'stock' => $datos['stock'],
                'prec_uni' => $datos['prec_uni']

            ]);

            DB::table('contenido')->insert([
                'id_conte' => $id_conte,
                'id_produc' => $id,
                'ruta' => $path,
                'tip_arch' => $image_ext

            ]);
        }



        return redirect('/admin/gestionarproducto')->with('alertalta', 'alta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(producto $producto)
    {



        // $resultados = DB::select('SELECT familia.nom_fami, claves.name,proveedor.nom,producto.titulo,producto.datos,producto.id_provee,producto.id_familia,producto.clav_clas,producto.id_produc,stock.stock,stock.prec_uni
        // FROM ((producto
        // INNER JOIN familia ON familia.id_familia = producto.id_familia)
        // INNER JOIN claves ON claves.id_clav=producto.clav_clas
        // INNER JOIN proveedor ON proveedor.id_provee = producto.id_provee
        // INNER JOIN stock ON stock.id_produc = producto.id_produc)')->paginate(20);



        $resultados = DB::table('producto')
            ->join('familia', 'familia.id_familia', '=', 'producto.id_familia')
            ->join('claves', 'claves.id_clav', '=', 'producto.clav_clas')
            ->join('proveedor', 'proveedor.id_provee', '=', 'producto.id_provee')
            ->join('stock', 'stock.id_produc', '=', 'producto.id_produc')
            ->select('familia.nom_fami', 'claves.name', 'proveedor.nom', 'producto.titulo', 'producto.datos', 'producto.id_provee', 'producto.id_familia', 'producto.clav_clas', 'producto.id_produc', 'stock.stock', 'stock.prec_uni')
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



        return view('admin.producto.cambios-baja.actualizarp')->with('resultado', $resultados)->with('proveedor', $proveedores)->with('familia', $familias)->with('clave', $claves)->with('producto', $productos);
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
    public function update(Request $request, $producto)
    {
        $datos = $request->except('_token');
        // INSERTAR LA IMAGEN A LA RUTA CORRESPONDIENTE

        $path = DB::table('contenido')
            ->where('id_produc', $producto)
            ->first();


        if ($request->hasFile('imagen')) {

            $image_name = $request->file('imagen')->getClientOriginalName();
            $image_ext = $request->file('imagen')->getClientOriginalExtension();
            // $path = "Imagenes/Productos/$nomfamilia->nom_fami/$nomproveedor->nom/$id";


            $imgnomfin = $producto . rand(0, 99) . ".";


            try {
                $request->file('imagen')->move(public_path($path->ruta), $imgnomfin . $image_ext);
            } catch (Exception $e) {
                echo "Entra en catch";
            }
        } else {
            echo "Entra en else";
        }

        DB::table('stock')
            ->where('id_produc', $producto)
            ->update([
                'stock' => $datos['stock'],
                'prec_uni' => $datos['prec_uni']
            ]);

        DB::table('producto')
            ->where('id_produc', $producto)
            ->update([
                'titulo' => $datos['titulo'],
                'datos' => $datos['datos'],


            ]);

        return redirect()->back()->with('alertact', 'actualizacion');

        // return response()->json($datos);
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($producto)
    {

        try {
            $contenido = DB::table('contenido')
            ->where('id_produc', $producto)
            ->first();
        $carpeta = public_path($contenido->ruta);

        foreach (glob($carpeta . "/*") as $archivos_carpeta) {
            if (is_dir($archivos_carpeta)) {
            } else {
                unlink($archivos_carpeta);
            }
        }

        rmdir($carpeta);
        } catch (\Throwable $th) {
            echo"Precaucion, carpeta no encontrada";
        }




        try {

            DB::table('oferta')->where('id_produc', '=', $producto)->delete();
            DB::table('stock')->where('id_produc', '=', $producto)->delete();
            DB::table('contenido')->where('id_produc', '=', $producto)->delete();
            DB::table('producto')->where('id_produc', '=', $producto)->delete();
        } catch (\Throwable $th) {
            DB::table('stock')->where('id_produc', '=', $producto)->delete();
            DB::table('contenido')->where('id_produc', '=', $producto)->delete();
            DB::table('producto')->where('id_produc', '=', $producto)->delete();
        }



        return redirect()->back()->with('alertbaja', 'baja');
    }
}
