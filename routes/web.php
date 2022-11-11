<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CategoriaProductoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//show
Route::get('/', [CategoriaController::class, 'index'])->name('categorias.ver');
//productos de categorias
Route::get("/categorias/nav/{id}", [CategoriaProductoController::class, "index"])->name('categoria.data');
//detalle producto
Route::get("/producto/nav/{id}", [ProductoController::class, "index"])->name("producto.data");
//compras
Route::get("/venta/list/{id}", [VentaController::class, "index"])->name("venta.list");
//logica
Route::post("/venta", [VentaController::class, "store"])->name("venta.insert");

//CRUD
//categorias
Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
Route::get('/categorias/list', [CategoriaController::class, 'list'])->name('categorias.list');
Route::post("/categorias/{id}/delete", [CategoriaController::class, "destroy"])->name("categorias.destroy");
Route::get("/categorias/{id}", [CategoriaController::class, "edit"])->name("categorias.edit");
//form
Route::post("/categorias", [CategoriaController::class, "store"])->name("categorias.store");
Route::post("/categorias/{id}", [CategoriaController::class, "update"])->name("categorias.update");
//create

Route::get("/categorias/{id}/producto", [CategoriaController::class, "productos"])->name("categorias.productos");


//categoria-productos
Route::get('/categorias-producto/create', [CategoriaProductoController::class, 'create'])->name('categorias_producto.create');
Route::get('/categoria-producto/list', [CategoriaProductoController::class, 'list'])->name('categorias_producto.list');
Route::post("/categorias-producto/{id}/delete", [CategoriaProductoController::class, "destroy"])->name("categorias_producto.destroy");
Route::get("/categorias-producto/{id}", [CategoriaProductoController::class, "edit"])->name("categorias_producto.edit");
//form
Route::post("/categorias-producto", [CategoriaProductoController::class, "store"])->name("categorias_producto.store");
Route::post("/categorias-producto/{id}", [CategoriaProductoController::class, "update"])->name("categorias_producto.update");
//create

//producto
Route::post("/producto/search", [ProductoController::class, "search"])->name("producto.search");
Route::get('/producto/create', [ProductoController::class, 'create'])->name('producto.create');
Route::get('/producto/list', [ProductoController::class, 'list'])->name('producto.list');
Route::post("/producto/{id}/delete", [ProductoController::class, "destroy"])->name("producto.destroy");
Route::get("/producto/{id}", [ProductoController::class, "edit"])->name("producto.edit");
//form
Route::post("/producto", [ProductoController::class, "store"])->name("producto.store");
Route::post("/producto/{id}", [ProductoController::class, "update"])->name("producto.update");
//create
//foto
Route::get("/producto/{id}/foto", [ProductoController::class, "foto"])->name("producto.foto");
Route::post("/producto/{id}/foto", [ProductoController::class, "postFoto"])->name("producto.post-foto");



Auth::routes();

