<!-- RGB: 227, 24, 55 rojo
     RGB: 0, 100, 145-->
@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        body{
            height: 100vh;
            text-align:center;
        }

        .wrap{
            width: 1100px;
            margin: 20px auto;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: right;
            overflow-y:hidden;
            overflow-x: scroll;
        }

        .tarjeta-wrap{
            margin: 10px;
            -webkit-perspective: 800;
            perspective: 800;
        }

        .tarjeta{
            width: 330px;
            height: 230px;
            
            position: relative;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
            -webkit-transition: .7s ease;
            transition: .7s ease;
            -webkit-box-shadow: 0px 10px 15px -5px rgba(0,0,0,0.65);
            box-shadow: 0px 10px 15px -5px rgba(0,0,0,0.65);
            border-radius: 20px;
        }

        .adelante, .atras{
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        .adelante{
            width: 100%;
            background: #fff;
            border-radius: 20px;
        }

        .atras{
            -webkit-transform: rotateY(180deg);
            transform: rotateY(180deg);
            padding: 15px;
            display: absolute;
            text-align: center;
            color: #fff;
            font-family: "open sans";
            background: #006491;;
            border-radius: 20px;
        }

        .tarjeta-wrap:hover .tarjeta{
            -webkit-transform: rotateY(180deg);
            transform: rotateY(180deg);
        }

        .card1{
            background-image: url(http://1.1m.yt/J9Kw7kl.jpg);
            background-size: cover;
        }

        .btn{
            border: 1px green;
            background: rgb(255, 255, 255);
            padding: 8px 20px;
            border-radius: 20px;
            text-decoration: none;
            color: #4CAF50;
            transition: all 0.5s;
            font-family: Arial, Helvetica, sans-serif;
        }
            
        .btn:hover{
            padding: 8px 40px;
            background: #4CAF50;
            color:white
        }

        h2{
            color:rgb(227, 24, 55);
            border-radius: 20px;
        }

        h5{
            background-color: rgb(0, 100, 145);
            color:white;
            border-radius: 10px;
        }
    </style>
</head>
<body>
        @if(Session::has('mensaje'))
            <div class="alert alert-success alert-danger" role="alert">
                {{Session::get('mensaje')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    <h2>NUESTRAS PIZZAS</h2>
    <h5>Especialidades (2 a 4 ings.)</h5>
    <div class="wrap">
        @foreach($pizzas as $pizza)
            <div class="tarjeta-wrap">
                <div class="tarjeta">
                    <div class="adelante card1">
                        <h5>{{$pizza->Nombre}}</h5>
                        <img class="rounded" src="{{asset('storage').'/'.$pizza->Foto}}" width="320" height="192" alt="">
                    </div>
                    <div class="atras">
                        <p>{{$pizza->Descripcion}}<br><br>Ingredientes: {{$pizza->Ingredientes}}</p>
                        <a href="../pedidos/orden/{{$pizza->id}}" class="btn">ORDENA AQUÍ</a>
                    </div>
                </div>
            </div>
        @endforeach
	</div>
    <h5>Especialidades (5 a 9 ings.)</h5>
    <div class="wrap">
        @foreach($pizzas2 as $pizza)
            <div class="tarjeta-wrap">
                <div class="tarjeta">
                    <div class="adelante card1">
                        <h5>{{$pizza->Nombre}}</h5>
                        <img class="rounded" src="{{asset('storage').'/'.$pizza->Foto}}" width="320" height="192" alt="">
                    </div>
                    <div class="atras">
                        <p>{{$pizza->Descripcion}}<br><br>Ingredientes: {{$pizza->Ingredientes}}</p>
                        <a href="../pedidos/orden/{{$pizza->id}}" class="btn">ORDENA AQUÍ</a>
                    </div>
                </div>
            </div>
        @endforeach
	</div>
</body>
</html> 
@endsection