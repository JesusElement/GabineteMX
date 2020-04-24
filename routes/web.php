<?
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
     return "Cache is cleared";
     });


Route::get('/', function () {
    return view('index');
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

Route::get('/altaproducto', function () {
    return view('admin.producto.index');
})->name('altaproducto');

Route::get('/actualizarproducto', function () {
    return view('admin.producto.cambios-baja.actualizarp');
})->name('producto');

Auth::routes();

Route::get('/altaproducto', 'ProductoController@index')->name('altaproducto');
Route::get('/actualizarproducto', 'ProductoController@show')->name('actualziarproducto');

Route::post('login','Auth\LoginController@login')->name('login');