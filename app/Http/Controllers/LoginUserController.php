<?php

namespace App\Http\Controllers;

use App\LoginUser;
use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class LoginUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Login');
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
     * @param  \App\LoginUser  $loginUser
     * @return \Illuminate\Http\Response
     */
    public function show(LoginUser $loginUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LoginUser  $loginUser
     * @return \Illuminate\Http\Response
     */
    public function edit(LoginUser $loginUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LoginUser  $loginUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoginUser $loginUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LoginUser  $loginUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoginUser $loginUser)
    {
        //
    }
}
