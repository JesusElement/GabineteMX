<?php

namespace App\Http\Controllers;

use App\TargCred;
use Illuminate\Http\Request;
use App\Http\Requests\TargCredStoreRe;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TargCredController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        return view('cliente.tarjetas.registroT');
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
    public function store(TargCredStoreRe $request)
    {
        //
        $data = $request->except('_token');
        $pass = 0;
        if (substr($data['num_tar'], 0, 2) > 50 && substr($data['num_tar'], 0, 2) < 56) {
            $pass = 1;
        } else if (substr($data['num_tar'], 0, 1) == 4) {
            $pass = 1;
        } else if (substr($data['num_tar'], 0, 2) == 34 || substr($data['num_tar'], 0, 2) == 37) {
            $pass = 1;
        } else {
            $pass = 0;
        }

        if ($pass == 1) {
            $id_cli =  auth()->user()->id_cliente;
            $date = date("y");
            $expira = substr($data['expi'], 5, 6);
            if ($date < $expira) {
                function encrypt($data, $key)
                {
                    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
                    $encrypted = openssl_encrypt($data, "aes-256-cbc", $key, 0, $iv);
                    // return the encrypted string with $iv joined 
                    return base64_encode($encrypted . "::" . $iv);
                }
                $key = "Una oracion al santro padre 3425ytsdfhvbdfs ";
                $string = $data['num_tar'];
                $encryptado = encrypt($string, $key);

                DB::table('cli_m_pago')->insert([
                    'id_cliente' => $id_cli,
                    'nom_card' => $data['name'],
                    'clave' => Hash::make($data['clave']),
                    'expi' => $data['expi'],
                    'num_tar' => $encryptado
                ]);
                if (isset($data['val'])) {
                    if ($data['val'] == 'CambioP') {
                        return redirect()->route('verCarrito');
                    }
                    return redirect()->route('MePaCli');
                } else {
                    return redirect()->route('index');
                }
            } else {
                return redirect()->back()->withErrors(['expi' => 'La tarjeta que se ingreso ya expiro, ingrese una o verifique la fecha'])->withInput();
            }
        } else {
            return redirect()->back()->withErrors(['num_tar' => 'El numero de tarjeta es invalido, ingrese un numero de tarjeta valido'])->withInput();
        }
        /* $data = request()->all();
            return response()->json($pass);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TargCred  $targCred
     * @return \Illuminate\Http\Response
     */
    public function show(TargCred $targCred)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TargCred  $targCred
     * @return \Illuminate\Http\Response
     */
    public function edit(TargCred $targCred)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TargCred  $targCred
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TargCred $targCred)
    {
        /*  
            $data = request()->all();
            $id = $data['id'];
            $id= ($id*2)/263412432;
            $iduser = auth()->user()->id_cliente;

            DB::table('cli_m_pago')
            ->where('id_pago', $id)
            ->update([
                'titulo' => $datos['titulo'],
                'datos' => $datos['datos'],


            ]);
           
            return response()->json($data);*/
        $data = $request->except('_token');
        $pass = 0;
        if (substr($data['num_tar'], 0, 2) > 50 && substr($data['num_tar'], 0, 2) < 56) {
            $pass = 1;
        } else if (substr($data['num_tar'], 0, 1) == 4) {
            $pass = 1;
        } else if (substr($data['num_tar'], 0, 2) == 34 || substr($data['num_tar'], 0, 2) == 37) {
            $pass = 1;
        } else {
            $pass = 0;
        }

        if ($pass == 1) {
            $id_cli =  auth()->user()->id_cliente;
            $id = $data['id'];
            $date = date("y");
            $datem = date("m");
            $expira = substr($data['expi'], 5, 6);
            $expira2 = substr($data['expi'], 0, 2);
            if (($date == $expira && $datem < $expira2) || $date < $expira) {
                function encrypt($data, $key)
                {
                    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
                    $encrypted = openssl_encrypt($data, "aes-256-cbc", $key, 0, $iv);
                    // return the encrypted string with $iv joined 
                    return base64_encode($encrypted . "::" . $iv);
                }
                $key = "Una oracion al santro padre 3425ytsdfhvbdfs ";
                $string = $data['num_tar'];
                $encryptado = encrypt($string, $key);
                $id = ($id * 2) / 263412432;
                DB::table('cli_m_pago')
                    ->where('id_pago', '=', $id)
                    ->where('id_cliente', '=', $id_cli)
                    ->update([
                        'nom_card' => $data['name'],
                        'clave' => Hash::make($data['clave']),
                        'expi' => $data['expi'],
                        'num_tar' => $encryptado
                    ]);

                return redirect()->route('MePaCli');
            } else {
                return redirect('EditInfoCli')->back()->withErrors(['expi' => 'La tarjeta que se ingreso ya expiro, ingrese una o verifique la fecha'])->withInput();
            }
        } else {
            return redirect()->back()->withErrors(['num_tar' => 'El numero de tarjeta es invalido, ingrese un numero de tarjeta valido'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TargCred  $targCred
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //DB::table('stock')->where('id_produc', '=', $producto)->delete();
        DB::table('cli_m_pago')->where('id_pago', '=', $id)->delete();
        return redirect()->route('MePaCli');
    }
}
