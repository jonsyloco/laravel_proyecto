<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use App\Models\Producto;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Route::get('/obtener_id',['uses' => 'TestController@verPagina'])->middleware(['auth'])->name('prueba');
Route::get('/obtener_id', [TestController::class, 'verPagina'])->name('pagina_principal');
//Route::get('/obtener_id', 'TestController@verPagina');

Route::get('/productos', function () {
    //se obtienen todos los productos del modelo
    $listadoProductos = Producto::orderBy('precio', 'DESC')->get();

    return view('productos.index', compact('listadoProductos'));
})->middleware(['auth'])->name('listado_productos');

Route::get('/productos/crear', function () {
    return view('productos.crear');
})->middleware(['auth'])->name('crear_productos');

Route::post('/productos', function (Request $request) {
    $nuevoProducto = new Producto;
    $nuevoProducto->descripcion = $request->input('descripcion');
    $nuevoProducto->precio = $request->input('precio');
    $nuevoProducto->save();
    //redireccion con mensaje de sesion
    return redirect()->route('listado_productos')->with('info', 'Producto creado exitosamente');
})->middleware(['auth'])->name('guardar_productos');


Route::delete('productos/{id}', function ($id) {
    $producto = Producto::findOrFail($id);
    $producto->delete();
    return redirect()->route('listado_productos')->with('info', 'Producto Borrado exitosamente');

})->name('eliminar_productos');

Route::delete('productos/{id}', function ($id) {
    $producto = Producto::findOrFail($id);
    $producto->delete();
    return redirect()->route('listado_productos')->with('info', 'Producto Borrado exitosamente');

})->name('eliminar_productos');

Route::get('productos/{id}/editar', function ($id) {
    $producto = Producto::findOrFail($id);   
    return view("productos.editar",compact('producto'));

})->name('editar_productos');


Route::put('productos/{id}', function (Request $request ,$id) {
    $producto = Producto::findOrFail($id);   
    $producto->descripcion = $request->input('descripcion');
    $producto->precio = $request->input('precio');        
    $producto->save();
    return redirect()->route('listado_productos')->with('info', 'Producto Actualizado exitosamente');

})->name('actualizar_productos');

require __DIR__ . '/auth.php';
