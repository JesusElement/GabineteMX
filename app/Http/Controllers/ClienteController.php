<?php

namespace App\Http\Controllers;

use App\cliente;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cliente $cliente)
    {
        //

        $cliente = $request->except('_token');
        $id_cli =  auth()->user()->id_cliente;
        if (isset($cliente['password'])) {

            if ($cliente['newpass'] != NULL) {
                if ($cliente['newpass'] == $cliente['confirmpass']) {
                    $pass =  auth()->user()->password;
                    if (password_verify($cliente['password'], $pass)) {
                        DB::table('cliente')
                            ->where('id_cliente', $id_cli)
                            ->update([
                                'password' => Hash::make($data['password'])
                            ]);
                        return redirect('cliente/');
                    } else {
                        return redirect()->back()->withErrors(['password' => 'La contraseña que ingreso es incorrecta'])->withInput();
                    }
                } else {
                    return redirect()->back()->withErrors(['confirmpass' => 'Las contraseñas no coinciden'])->withInput();
                }
            } else {
                return redirect()->back()->withErrors(['newpass' => 'Debe ingresar una contraseña'])->withInput();
            }
        } else {
            $mail = auth()->user()->email;
            if ($cliente['email'] == $mail) {
                $this->validate($request, [
                    'nom' => ['required', 'string', 'max:75'],
                    'ape2' => ['required', 'string', 'max:75'],
                    'ape2' => ['required', 'string', 'max:75'],
                    'telefono' => ['required', 'numeric', 'min:10'],
                ]);
                DB::table('cliente')
                    ->where('id_cliente', $id_cli)
                    ->update([
                        'nom' => $cliente['nom'],
                        'ape1' => $cliente['ape1'],
                        'ape2' => $cliente['ape2'],
                        'email' => $cliente['email'],
                        'telefono' => $cliente['telefono'],
                        'fech_na' => '2020/02/10',
                    ]);
                return redirect('cliente/');
            } else {
                $si =     $this->validate($request, [
                    'nom' => ['required', 'string', 'max:75'],
                    'ape2' => ['required', 'string', 'max:75'],
                    'ape2' => ['required', 'string', 'max:75'],
                    'telefono' => ['required', 'numeric', 'min:10'],
                    'email' => ['required', 'string', 'email', 'max:100', 'unique:cliente'],
                ]);
                if ($si) {
                    DB::table('cliente')
                        ->where('id_cliente', $id_cli)
                        ->update([
                            'nom' => $cliente['nom'],
                            'ape1' => $cliente['ape1'],
                            'ape2' => $cliente['ape2'],
                            'email' => $cliente['email'],
                            'telefono' => $cliente['telefono'],
                            'fech_na' => '2020/02/10',
                        ]);
                    return redirect('cliente/');
                } else {
                    return redirect()->back()->withErrors(['unique' => 'El correo ingresado ya esta registrado'])->withInput();
                }
            }
        }
        //return response()->json($cliente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(cliente $cliente)
    {
        //
    }
}
