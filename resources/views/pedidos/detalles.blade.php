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
            {{ __('Detalles en el pedido')}}
        </h2>
        <a href="{{route('pedidos.index')}}" class="btn btn-success">Regresar</a>
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
                </tr>
            </thead>
            @php ($it=0)
            <tbody>
                @foreach($compras as $compra)
                    <tr>
                        <td>
                            <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$compra->Foto}}" width="150" alt="">
                        </td>
                        <td>{{$compra->Nombre}}</td>
                        <td>{{$compra->Descripcion}} </td>
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
                    </tr>
                @endforeach
                <tr>
                    <td></td><td></td><td></td>
                    <td><h2>Total</h2></td>
                    <td></td>
                    <td><h3>${{$it}}.00</h3></td>
                </tr>
            </tbody>
        </table>

    </div>
@endsection







