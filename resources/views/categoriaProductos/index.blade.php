@extends('layouts.app')
@section('content')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1 class="card-title mb-3">Productos de {{$listCategoriaProducto[0]->getNombreCategoriaForDisplay($listCategoriaProducto[0]->categoria_id)}}</h1>
@foreach($listCategoriaProducto as $categoriaProducto)
{{--    href="{{route("producto.data",$categoriaProducto->producto_id)}}"--}}
    <a class="btn btn-success"
       href="{{url("/producto/nav",$categoriaProducto->producto_id)}}">
        <img class="foto-perfil" src="/images/{{ $categoriaProducto->getProductoForDisplay($categoriaProducto->producto_id)->getFotoPerfilForDisplay() }}" alt="foto"/>
        <br>
        {{$categoriaProducto->getProductoForDisplay($categoriaProducto->producto_id)->nombre}}</a>
@endforeach
</body>
</html>
@endsection
