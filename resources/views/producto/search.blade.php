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
@foreach($listaProductos as $producto)
    <a class="btn btn-success"
       href="{{route("producto.data",$producto->id)}}">
        <img class="foto-perfil" src="/images/{{ $producto->getFotoPerfilForDisplay() }}" alt="foto"/>
        <br>
        {{$producto->nombre}}</a>
@endforeach
</body>
</html>
@endsection
