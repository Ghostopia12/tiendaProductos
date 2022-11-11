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
    <div>
        <img class="foto-perfil" src="/images/{{ $objProducto->getFotoPerfilForDisplay() }}" alt="foto"/>
    </div>
    <div>
        <h1>{{$objProducto->nombre}}</h1>
        <h1>Precio {{$objProducto->precio}}</h1>
        <h2>Stock {{$objProducto->stock}}</h2>
        <p>{{$objProducto->descripcion}}</p>
    </div>
    @if($objProducto->stock > 0)
        @auth()
<div>
    <form method="post" action="{{route("venta.insert")}}">
        @csrf
        <input type="hidden" value="{{$objProducto->id}}" name="producto_id">
        <input type="hidden" value="{{auth()->user()->id ?? ""}}" name="user_id">
        <select name="cantidad" id="cantidad" class="form-select">
            @for($num = 1; $num <=$objProducto->stock ; $num++)
                <option value="{{$num}}">
                    {{$num}}
                </option>
            @endfor
        </select>

    <div class="mt-3">
        <button class="btn btn-primary" type="submit">Comprar</button>
    </div>
    </form>
</div>
        @endauth
    @endif
</body>
</html>
@endsection
