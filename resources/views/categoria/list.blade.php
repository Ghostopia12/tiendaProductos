@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">Lista de Categorias</div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listaCategorias as $objCategoria)
                                <tr>
                                    <td>{{ $objCategoria->id }}</td>
                                    <td>{{ $objCategoria->nombre }}</td>
{{--                                    <td>--}}
{{--                                        @foreach($objCategoria->productos as $objProducto)--}}
{{--                                            <div>--}}
{{--                                                <a class="btn btn-link"--}}
{{--                                                   href="{{route("producto.edit",$objProducto->id)}}">{{$objProducto->nombre}}</a>--}}
{{--                                            </div>--}}
{{--                                        @endforeach--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <a class="btn btn-secondary"--}}
{{--                                           href="{{route("categorias.productos",$objCategoria->id)}}">Ver Productos</a>--}}
{{--                                    </td>--}}
                                    <td>
                                        <a class="btn btn-primary" href="{{route("categorias.edit",$objCategoria->id)}}">Editar</a>
                                    </td>
                                    <td>
                                        <form onsubmit="return confirm('Estás seguro que deseas eliminar?')"
                                              method="post" action="{{route("categorias.destroy",$objCategoria->id)}}">
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
