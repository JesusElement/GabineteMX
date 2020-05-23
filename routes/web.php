<?php

use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

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
        ->join('producto as a', 'a.id_produc', '=', 'b.id_produc')
        ->join('stock as c', 'c.id_produc', '=', 'b.id_produc')
        ->join('familia as d', 'd.id_familia', '=', 'a.id_familia')
        ->join('proveedor as e', 'e.id_provee', '=', 'a.id_provee')
        ->orderBy('prec_uni', 'DESC')
        ->paginate(8);
    return view('index', ['productos' => $productos], ['ofertas' => $ofertas]);
})->name('index');

Route::get('/carrito', function () {
    return view('cliente.carrito.index');
})->name('carrito');

Route::get('/ayuda/{tip}', function ($tip) {
    return view('cliente.ayuda.index', ['tip' => $tip]);
})->name('ayuda');

Route::get('/productos', function () {
    return view('cliente.producto.index');
})->name('productos');

Route::get('/producto', function () {
    return view('cliente.producto.especifico');
})->name('producto');


Route::get('/buscarproducto', function () {

    return view('cliente.producto.buscarproducto');
})->name('buscarproducto');

// Route::middleware('auth')->group(function () {

Route::get('/admin/altaproducto', function () {
    return view('admin.producto.index');
})->name('altaproducto');

Route::get('/admin/gestionarproducto', function () {
    return view('admin.producto.cambios-baja.actualizarp');
})->name('producto');


Route::get('/admin/gestionpromocion', function () {
    return view('admin.producto.promocion.index');
})->name('promocion');

Route::get('/admin/gestionproveedores', function () {
    return view('admin.proveedores.index');
})->name('provedoresdash');


Route::get('/admin', function () {
    return view('admin.index');
})->name('adminindex');



Auth::routes();

Route::get('admin/home', 'HomeController@adminHome')->name('admin.index')->middleware('is_admin');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/altaproducto', 'ProductoController@index')->name('altaproducto');
Route::get('/admin/gestionarproducto', 'ProductoController@show')->name('verproducto');
Route::post('/admin/storeproducto', 'ProductoController@store')->name('insertarproducto');
Route::delete('/admin/gestionarproducto/{id_produc}', 'ProductoController@destroy')->name('eliminarproducto');
Route::post('/admin/gestionarproducto/{id_produc}', 'ProductoController@update')->name('actualizarproducto');




Route::get('/buscarproducto/{search}', 'BuscarProductoController@show')->name('buscarproducto');
Route::get('/buscarproductoS', 'BuscarProductoController@recibir')->name('buscarproductoS');

Route::get('/carrito/{producto}', 'CarritoController@store')->name('agregarAcarrito');
Route::get('/carrito', 'CarritoController@show')->name('verCarrito');
Route::get('/EliCarrito/{Eli}', 'CarritoController@destroy')->name('EliCarrito');
Route::get('/carritoMenos/{Menos}', 'CarritoController@Menos')->name('carritoMenos');
Route::get('/carritoMas/{Mas}', 'CarritoController@Mas')->name('carritoMas');


Route::get('/admin/gestionpromocion', 'PromocionController@show')->name('verpromociones');
Route::post('/admin/altapromocion', 'PromocionController@store')->name('altapromociones');
Route::delete('/admin/bajapromocion/{id_produc}', 'PromocionController@destroy')->name('bajapromociones');
Route::post('/admin/cambiopromocion/{id_oferta}', 'PromocionController@update')->name('cambiopromociones');

Route::get('/admin/gestionproveedores', 'ProveedoresController@show')->name('verproveedores');
Route::post('/admin/altaproveedores', 'ProveedoresController@store')->name('altaProveedores');
Route::delete('/admin/bajaproveedores/{id_provee}', 'ProveedoresController@destroy')->name('bajaProveedores');
Route::post('/admin/cambioproveedores/{id_provee}', 'ProveedoresController@update')->name('cambioProveedores');






// });


Route::middleware('auth')->group(function () {
    Route::get('cliente/sessions', function () {
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

    Route::get('cliente/direccion', function () {
        return view('cliente.dirreccion.agregarD');
    })->name('AddDirecP');

    Route::get('cliente/direcciones', function () {
        return view('cliente.dirreccion.index');
    })->name('Direcciones');

    Route::get('cliente/direcciones/{tipo}/{id}', function ($tipo, $id) {
        return view('cliente.dirreccion.agregarD', ['tipo' => $tipo, 'id' => $id]);
    })->name('DireccionesActu');

    Route::post('cliente/direccion', 'DireccionController@store')->name('AddDirec');
    Route::post('cliente/direcciones/{tipo}/{id}', 'DireccionController@update')->name('DirecUpdate');
    Route::delete('cliente/direc/{id}', 'DireccionController@destroy')->name('DirecDestroy');

    Route::get('cliente/Tarjetas', function () {
        return view('cliente.tarjetas.registroT');
    })->name('RegistroT');

    Route::get('cliente/Tarjetas/update', function () {
        return view('cliente.tarjetas.registroT');
    })->name('UpdateT');

    Route::post('cliente/Tarjetas', 'TargCredController@store')->name('AddTarj');

    Route::get('cliente/', function () {
        return view('cliente.index');
    })->name('CuentaCli');

    Route::post('cliente/Tarjetas/update', 'TargCredController@update')->name('ModTarj');

    Route::get('cliente/metodos/pagos', function () {
        return view('cliente.tarjetas.index');
    })->name('MePaCli');

    Route::delete('cliente/Tarjetas/delete/{id}', 'TargCredController@destroy')->name('DelTarj');

    Route::get('/cliente/editar/{id}', function ($id) {
        return view('cliente.edit', ['id' => $id]);
    })->name('EditInfoCli');

    Route::post('/cliente/update/datos/{id}', 'ClienteController@update')->name('EditCiente');

    Route::delete('/cliente/eliminar/{id}', 'ClienteController@destoy')->name('CerrarCuenta');

    Route::post('/cliente/comentario/{producto}/{idcli}', 'ComentController@store')->name('addcoment');

    Route::post('/cliente/pago/{total}', 'PagoController@store')->name('procederpago');



    ///CLIENTES PEDIDO

    Route::get('cliente/pedidos', function () {
        return view('cliente.pedidos.index');
    })->name('verped');
});



Route::get('cliente/factura',function(){

     //$pdf = PDF::loadView('cliente.factura.index');
    return view('cliente.factura.index');
 });

 Route::get('/cliente/factura/{folio}','PagoController@printPDF')->name('ImPDF');
