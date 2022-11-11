@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">Lista de Productos</div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Stock</th>
                                <th>Precio</th>
                                <th>Descripcion</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listaProducto as $objProducto)
                                <tr>
                                    <td><img class="foto-perfil" src="/images/{{ $objProducto->getFotoPerfilForDisplay() }}" alt="foto"/></td>
                                    <td>{{ $objProducto->id }}</td>
                                    <td>{{ $objProducto->nombre }}</td>
                                    <td>{{ $objProducto->stock }}</td>
                                    <td>{{ $objProducto->precio }}</td>
                                    <td>{{ $objProducto->descripcion}}</td>
                                    <td>
                                        <a class="btn btn-success"
                                           href="{{route("producto.foto",$objProducto->id)}}">Foto de Perfil</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route("producto.edit",$objProducto->id)}}">Editar</a>
                                    </td>
                                    <td>
                                        <form onsubmit="return confirm('Estás seguro que deseas eliminar?')"
                                              method="post" action="{{route("producto.destroy",$objProducto->id)}}">
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
