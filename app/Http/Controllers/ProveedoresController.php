<?php

namespace App\Http\Controllers;

use App\Proveedores;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use BD;
use App\Http\Controllers\Session;
use Exception;
use Hamcrest\Core\HasToString;
use App\Http\Controllers\Input;
use Symfony\Component\Console\Input\Input as InputInput;
use SweetAlert;



class ProveedoresController extends Controller
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
        //ALTA PROVEEDORES


        $datos = $request->except('_token');

        //  Primeras dos letras del proveedor (nombre corto) luego 3 numeros rad  3 letras randon y al final otros 3 numeros rand


        $x = "Z";
        $y = "A";

        $letraAleatoria = chr(rand(ord($y), ord($x)));
        $letraAleatoria2 = chr(rand(ord($x), ord($y)));
        $letraAleatoria3 = chr(rand(97, 122));



        $id = strtoupper(substr($datos['nom'], 0, 2));
        $id = $id . rand(100, 999);
        $id = $id . $letraAleatoria;
        $id = $id . $letraAleatoria2;
        $id = $id . strtoupper($letraAleatoria3);
        $id = $id . rand(100, 999);




        DB::table('proveedor')->insert([
            'id_provee' => $id,
            'nom' => $datos['nom'],
            'nom_or' => $datos['nom_or'],
            'correo' => $datos['correo'],
            'telefono' => $datos['telefono'],
            'razon_s' => $datos['razon_s'],
            'direccion' => $datos['direccion'],
            'cp' => $datos['cp'],
            'rfc' => $datos['rfc']

        ]);


        // return response()->json($id);
        return redirect()->back()->with('alertalta', 'alta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedores $proveedores)
    {
        $resultados = DB::table('proveedor')
            ->select('id_provee', 'nom', 'nom_or', 'correo', 'telefono', 'razon_s', 'direccion', 'cp', 'rfc')
            ->orderBy('nom', 'asc')
            ->paginate(30);
        return view('admin.proveedores.index')->with('resultado', $resultados);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedores $proveedores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $proveedores)
    {
        $datos = $request->except('_token');


        DB::table('proveedor')
            ->where('id_provee', '=', $proveedores)
            ->update([

                'nom' => $datos['nom'],
                'nom_or' => $datos['nom_or'],
                'correo' => $datos['correo'],
                'telefono' => $datos['telefono'],
                'razon_s' => $datos['razon_s'],
                'direccion' => $datos['direccion'],
                'cp' => $datos['cp'],
                'rfc' => $datos['rfc']

            ]);


        return redirect()->back()->with('alertact', 'actualizacion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function destroy($proveedores)
    {

        try {
            DB::table('proveedor')->where('id_provee', '=', $proveedores)->delete();
            return redirect()->back()->with('alertbaja', 'baja');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorbaja', 'errorbaja');
        }
        


        
    }
}
