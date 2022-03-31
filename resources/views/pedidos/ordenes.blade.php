@extends('layouts.app')

@section('content')
    <style type="text/css">
        h2{
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

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pizzas en el pedido')}}
        </h2>
        
        @if(Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{Session::get('mensaje')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <a href="{{url('/')}}" class="btn btn-success">Seguir comprando</a>
        <br><br>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Tamaño</th>
                    <th>Cantidad</th>
                    <th>Importe</th>
                    <th> Acciones </th>
                </tr>
            </thead>
            @php ($it=0)
            <tbody>
                @foreach($compras as $compra)
                    <tr>
                        <td>
                            <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$compra->foto}}" width="150" alt="">
                        </td>
                        <td>{{$compra->nombre}}</td>
                        <td>{{$compra->descripcion}} </td>
                        @if($compra->tamanio=='1')
                            <td>Chica</td>
                        @elseif ($compra->tamanio=='1.3')
                            <td>Mediana</td>
                            @else
                            <td>Grande</td>
                        @endif
                        <td>{{$compra->cantidad}}</td>
                        <td>{{$compra->total}}</td>
                        @php ($it = floatval($it)+floatval($compra->total))
                        <td>
                            <a href="{{url('pedidos/'.$compra->pizzas_id.'/'.$compra->tamanio.'/edit')}}" class="btn btn-warning"> Editar </a>
                            <a href="{{url('pedidos/'.$compra->pizzas_id.'/'.$compra->tamanio.'/elim')}}" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td></td><td></td><td></td>
                    <td><h2>Total</h2></td>
                    <td></td>
                    <td><h3>${{$it}}.00</h3></td>
                    <td><a href="{{url('pedidos/'.$it.'/pagar')}}" class="btn btn-success" style="font-size:120%;align-items:center" >Seguir</a></td>
                </tr>
            </tbody>
        </table>

    </div>
@endsection




