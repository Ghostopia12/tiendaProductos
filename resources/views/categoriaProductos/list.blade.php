@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lista de Categorias-Productos</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Categoria</th>
                                <th>Producto</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listCategoriaProducto as $objCategoriaProducto)
                                <tr>
                                    <td>{{ $objCategoriaProducto->id }}</td>
                                    <td>{{ $objCategoriaProducto->getNombreCategoriaForDisplay($objCategoriaProducto->categoria_id) }}</td>
                                    <td>{{ $objCategoriaProducto->getProductoForDisplay($objCategoriaProducto->producto_id)->nombre }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route("categorias_producto.edit",$objCategoriaProducto->id)}}">Editar</a>
                                    </td>
                                    <td>
                                        <form onsubmit="return confirm('Estás seguro que deseas eliminar?')"
                                              method="post" action="{{route("categorias_producto.destroy",$objCategoriaProducto->id)}}">
                                            @csrf
                                            <button class="btn btn-danger" type="submit">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
