<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\CategoriaProducto;
use App\Models\Producto;
use Illuminate\Http\Request;

class CategoriaProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $listCategoriaProducto = CategoriaProducto::where("categoria_id","like","%$id%")->get();
        if ($listCategoriaProducto == null) {
            return redirect()->route("categorias.ver");
        }

        return view("categoriaProductos.index", compact("listCategoriaProducto"));
    }

    public function list(){
        $listCategoriaProducto = CategoriaProducto::all();
        return view("categoriaProductos.list", compact("listCategoriaProducto"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaProductos = Producto::all();
        $listaCategoria = Categoria::all();
        return view("categoriaProductos.form", compact("listaProductos","listaCategoria"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoriaProducto = new CategoriaProducto();
        $categoriaProducto->fill($request->all());
        $categoriaProducto->save();

        return redirect()->route("categorias_producto.list");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objCategoriaProducto = CategoriaProducto::find($id);
        $listaProductos = Producto::all();
        $listaCategoria = Categoria::all();


        return view("categoriaProductos.form", compact("objCategoriaProducto", "listaProductos","listaCategoria"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $objCategoriaProducto = CategoriaProducto::find($id);
        $objCategoriaProducto->fill($request->all());
        $objCategoriaProducto->save();

        return redirect()->route("categorias_producto.list");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objCategoriaProducto = CategoriaProducto::find($id);
        if ($objCategoriaProducto == null) {
            return redirect()->route("categorias_producto.list");
        }
        $objCategoriaProducto->delete();

        return redirect()->route("categorias_producto.list");
    }
}
