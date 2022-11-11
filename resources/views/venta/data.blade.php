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
@foreach($listVenta as $venta)
    <div class="container row justify-content-center card mb-3">
    <div>
        <img class="foto-perfil" src="/images/{{ $venta->getProductoForDisplay($venta->producto_id)->getFotoPerfilForDisplay() }}" alt="foto"/>
    </div>
    <div>
        <h1>{{$venta->getProductoForDisplay($venta->producto_id)->nombre}}</h1>
        <h1>Cantidad: {{$venta->cantidad}}</h1>
        <h2>Precio unitario: {{$venta->precio_venta}}</h2>
        <h2>Precio total: {{$venta->precio_total}}</h2>
    </div>
    </div>
@endforeach
</body>
</html>
@endsection
