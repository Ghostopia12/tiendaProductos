@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Formulario de Productos</div>

                    <div class="card-body">
                        <form method="post" action="{{!isset($objProducto)?route("producto.store"):""}}">
                            @csrf
                            <div>
                                <label for="nombre">Nombre</label>
                                <input class="form-control" type="text" name="nombre" id="nombre"
                                       value="{{old("nombre",$objProducto->nombre ?? "")}}">
                                @error("nombre")
                                <div class="text-danger">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="stock">Stock</label>
                                <input class="form-control" type="number" name="stock" id="stock"
                                       value="{{old("stock",$objProducto->stock ?? "")}}">
                                @error("stock")
                                <div class="text-danger">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="precio">Precio</label>
                                <input class="form-control" type="number" name="precio" id="precio"
                                       value="{{old("precio",$objProducto->precio ?? "")}}">
                                @error("precio")
                                <div class="text-danger">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="descripcion">Descripcion</label>
                                <input class="form-control" type="text" name="descripcion" id="descripcion"
                                       value="{{old("descripcion",$objProducto->descripcion ?? "")}}">
                                @error("descripcion")
                                <div class="text-danger">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-primary" type="submit">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
