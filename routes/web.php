<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


Route::get('/', function () {
    $productos = DB::table('producto')
        ->orderBy('titulo', 'DESC')
        ->paginate(2);

    $ofertas = DB::table('oferta as b')
        ->join('producto as a','a.id_produc','=','b.id_produc')
        ->join('stock as c','c.id_produc','=','b.id_produc')
        ->join('familia as d','d.id_familia','=','a.id_familia')
        ->join('proveedor as e','e.id_provee','=','a.id_provee')
        ->paginate(8);
    return view('index', ['productos' => $productos], ['ofertas' => $ofertas]);
})->name('index');

Route::get('/carrito', function () {
    return view('cliente.carrito.index');
})->name('carrito');

Route::get('/ayuda', function () {
    return view('cliente.ayuda.index');
})->name('ayuda');

Route::get('/producto', function () {
    return view('cliente.producto.index');
})->name('producto');


Route::get('/buscarproducto', function() {
    return view('cliente.producto.buscarproducto');
    
 })->name('buscarproducto');

// Route::middleware('auth')->group(function () {

    Route::get('/altaproducto', function () {
        return view('admin.producto.index');
    })->name('altaproducto');

    Route::get('/actualizarproducto', function () {
        return view('admin.producto.cambios-baja.actualizarp');
    })->name('producto');



    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/altaproducto', 'ProductoController@index')->name('altaproducto');
    Route::get('/actualizarproducto', 'ProductoController@show')->name('verproducto');
    Route::get('/storeproducto', 'ProductoController@store')->name('insertarproducto');
    Route::delete('/actualizarproducto/{id_produc}', 'ProductoController@destroy')->name('eliminarproducto');
    Route::post('/actualizarproducto/{id_produc}', 'ProductoController@update')->name('actualizarproducto');
    
// });


Route::middleware('auth')->group(function () {
    Route::get('/sessions', function () {
        $sessions = DB::table('sessions')
            ->where('user_id', auth()->id())
            ->orderBy('last_activity', 'DESC')
            ->get();
        return view('auth.sessions', ['sessions' => $sessions]);
    });
    Route::post('/delete-session', function (Request $request) {
        DB::table('sessions')
            ->where('id', $request->id)
            ->where('user_id', auth()->id())
            ->delete();
    });
});
