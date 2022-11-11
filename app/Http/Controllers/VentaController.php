<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $listVenta = Venta::where("user_id","like","%$id%")->get();
//        dd($listVenta);
        if ($listVenta == null) {
            return redirect()->route("categorias.ver");
        }
        return view("venta.data", compact("listVenta"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
//        $this->store($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//            dd($request);
//        $validated = $request->validate([
//            "producto_id"         => "required|numeric",
//            "cantidad"       => "required|numeric",
//            "precio_venta"            => "required|numeric",
//            "precio_total" => "required|numeric",
//            "user_id"          => "required|numeric",
//        ]);
//        if ( ! $validated) {
//            return redirect()->back()->withErrors($validated);
//        }
//        dd($request->all());
        $venta = new Venta();
        $venta->producto_id = $request->producto_id;
        $venta->cantidad = $request->cantidad;
        $venta->user_id = $request->user_id;
        $producto = Producto::find($request->producto_id);
        $venta->precio_venta = $producto->precio;
        $venta->precio_total = $producto->precio * $request->cantidad;
        $venta->save();
        $producto->stock = $producto->stock - $request->cantidad;
        $producto->save();
        return redirect()->route("venta.list","$request->user_id");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
