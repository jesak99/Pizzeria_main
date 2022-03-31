@extends('layouts.app')

@section('content')
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
        }

        .wrap{
            width: 1100px;
            margin: 10px auto;
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
            margin: 50px;
            -webkit-perspective: 800;
            perspective: 800;
        }

        .tarjeta{
            width: 330px;
            height: 500px;
            position: relative;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
            -webkit-transition: .7s ease;
            transition: .7s ease;
            -webkit-box-shadow: 0px 10px 15px -5px rgba(0,0,50,0.65);
            box-shadow: 0 5px 10px rgba(0,0,50,0.65), 0 15px 40px rgba(0,0,50,0.65);
            border-radius: 20px;
        }

        .adelante{
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            background: #fff;
            border-radius: 20px;
        }

        h2{
            color:rgb(227, 24, 55);
            text-align:center;
            text-transform: uppercase;
        }

        h3{
            background-color: rgb(0, 100, 145);
            color:white;
            border-radius: 25px;
            text-align:center;
        }

        .p1{
            margin: 8px;
            color:rgb(0, 100, 145);
            font-weight: bold;
            line-height: 1.2em; 
            font-size: 1em;
            text-transform: uppercase;
        }

        .p2{
            margin: 5px;
            line-height: 1.2em; 
            font-size: 1em;
            font-weight: bold;
            text-align:center;
            font-size:medium;
        }
    </style>

    <div class="container">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MIS DIRECCIONES')}}
        </h2>
        
        @if(Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{Session::get('mensaje')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <a href="{{url('user/create')}}" class="btn btn-success">Registrar nueva dirección</a>
        <div class="wrap">
            @foreach($direcciones as $dir)
                <div class="tarjeta-wrap">
                    <div class="tarjeta">
                        <div class="adelante">
                            <h3>{{$dir->Nombre}}</h3>
                            <div class="row">
                                <div class="col">
                                    <p class="p1">CÓDIGO POSTAL:</p><p class="p2">{{$dir->CP}}</p>
                                </div>
                                <div class="col">
                                    <p class="p1">COLONIA:</p><p class="p2">{{$dir->Colonia}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="p1">CALLE:</p><p class="p2">{{$dir->Calle}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="p1">REFERENCIAS:</p><p class="p2">{{$dir->Referencias}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="p1">NÚMERO EXTERIOR:</p><p class="p2">{{$dir->NumExterior}}</p>
                                </div>
                                <div class="col">
                                    <p class="p1">NÚMERO INTERIOR:</p><p class="p2">{{$dir->NumInterior}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="p1">TELÉFONO:</p><p class="p2">{{$dir->Telefono}}</p>
                                </div>
                                <div class="col">
                                    <p class="p1">CUIDAD:</p><p class="p2">{{$dir->Ciudad}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="p1">MUNICIPIO:</p><p class="p2">{{$dir->Municipio}}</p>
                                </div>
                                <div class=col>
                                    <p class="p1">ESTADO:</p><p class="p2">{{$dir->Estado}}</p>
                                </div>
                            </div>
                            <br>
                            <center>
                            <a href="{{url('/user/'.$dir->id.'/edit')}}" class="btn btn-warning">Editar</a>   
                            <form action="{{url('/user/'.$dir->id)}}" class="d-inline" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Deseas borrar?')" value="Borrar">
                            </form>
                            </center>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection