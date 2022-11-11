<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
//        dd($id);
        $objProducto = Producto::find($id);
        return view('producto.detail',compact("objProducto"));
    }
    public function list(){
        $listaProducto = Producto::all();
        return view("producto.list", compact("listaProducto"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("producto.form");
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
        $producto = new Producto();
        $producto->fill($request->all());
        $producto->save();

        return redirect()->route("producto.list");
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
        $objProducto = Producto::find($id);
        if ($objProducto == null) {
            return redirect()->route("producto.list");
        }

        return view("producto.form", compact("objProducto"));
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
        $objProducto = Producto::find($id);
        if ($objProducto == null) {
            return redirect()->route("producto.list");
        }
        $objProducto->fill($request->all());
        $objProducto->save();

        return redirect()->route("producto.list");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objProducto = Producto::find($id);
        if ($objProducto == null) {
            return redirect()->route("producto.list");
        }
        $objProducto->delete();

        return redirect()->route("producto.list");
    }

    public function search(Request $request)
    {
//        dd($request);
        $search        = $request->input("busqueda");
        $listaProductos = Producto::where("nombre", "like", "%$search%")->get();

        return view("producto.search", compact("listaProductos"));
    }

    public function foto($id)
    {
        $objProducto = Producto::find($id);
        if ($objProducto == null) {
            return redirect()->route("categorias.ver");
        }

        return view("producto.foto", compact("objProducto"));
    }

    public function postFoto(Request $request, $id)
    {
        $objProducto = Producto::find($id);
        if ($objProducto == null) {
            return redirect()->route("producto.list");
        }
        $validated = $request->validate([
            "foto" => "required|image",
        ]);
        if ( ! $validated) {
            return redirect()->back()->withErrors($validated);
        }

        $file     = $request->file("foto");
        $uuidName = Str::uuid()->toString();
        $name     = "$uuidName.".$file->getClientOriginalExtension();
        $file->move(public_path("images"), $name);
        $objProducto->imagen = $name;
        $objProducto->save();

        return redirect()->route("producto.list");
    }
}
