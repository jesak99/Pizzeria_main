@extends('layouts.app')

@section('content')
 <style type="text/css">
        h1{
            color:rgb(227, 24, 55);
            text-align:center;
            text-transform: uppercase;
        }

        label{
            color:rgb(0, 100, 145);
            font-weight: bold;
            text-transform: uppercase;
        }

        thead {
            color: #fff;
            background-color: rgb(0, 100, 145);
            text-align:center;
            text-transform: uppercase;
        }
        td{
            text-align:center;
        }
    </style>

    <div class="container">

        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pedidos')}}
        </h1>
        
        @if(Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{Session::get('mensaje')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <a href="{{url('/')}}" class="btn btn-success">Volver</a>
        <br><br>
        <table class="table table-light">
            <thead>
                <tr>

                    <th>Fecha</th>
                    <th>Importe</th>
                    <th>Estado</th>
                    <th>Entrega</th>
                    @if(Auth::user()->fullacces=='yes')
                    <th> Acciones</th>
                    @endif
                </tr>
            </thead>
            @php ($it=0)
            <tbody>
                @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{$pedido->fecha}}</td>
                        <td>{{$pedido->total}} </td>
                        <td>{{$pedido->estado}}</td>
                        <td>{{$pedido->entrega}}</td>
                        @if(Auth::user()->fullacces=='yes')
                        <td>
                            <a href="{{url('pedidos/'.$pedido->id.'/detalles')}}" class="btn btn-success">Detalles</a>
                            <a href="{{url('pedidos/'.$pedido->id.'/aceptar')}}" class="btn btn-success">Aceptar</a>
                            <a href="{{url('pedidos/'.$pedido->id.'/entregar')}}" class="btn btn-success">Entregado</a>
                            <a href="{{url('pedidos/'.$pedido->id.'/preparada')}}" class="btn btn-success">Preparado</a>
                            <a href="" class="btn btn-success">Enviar</a>
                            <a href="{{url('pedidos/'.$pedido->id.'/rechazar')}}" class="btn btn-danger">Rechazar</a>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>




@endsection