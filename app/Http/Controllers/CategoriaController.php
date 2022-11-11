<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaCategorias = Categoria::all();
        return view('categoria.index',compact("listaCategorias"));
    }
    public function list(){
        $listaCategorias = Categoria::all();
        return view("categoria.list", compact("listaCategorias"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd("holamuind");
        return view("categoria.form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate si funca
        $categoria = new Categoria();
        $categoria->fill($request->all());
        $categoria->save();

        return redirect()->route("categorias.list");
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
        $objCategoria = Categoria::find($id);
        if ($objCategoria == null) {
            return redirect()->route("categorias.list");
        }

        return view("categoria.form", compact("objCategoria"));
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
        $objCategoria = Categoria::find($id);
        if ($objCategoria == null) {
            return redirect()->route("categorias.list");
        }
        $objCategoria->fill($request->all());
        $objCategoria->save();

        return redirect()->route("categorias.list");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objCategoria = Categoria::find($id);
        if ($objCategoria == null) {
            return redirect()->route("categorias.list");
        }
        $objCategoria->delete();

        return redirect()->route("categorias.list");
    }
    public function productos($id)
    {
        $objCategoria = Categoria::find($id);
        if ($objCategoria == null) {
            return redirect()->route("categorias.list");
        }
        $listaProductos = $objCategoria->productos;

        return view("producto.list", compact("listaProductos"));
    }
}
