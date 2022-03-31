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
    </style>

    <div class="container">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de pizzas')}}
        </h2>
        
        @if(Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{Session::get('mensaje')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <a href="{{url('pizza/create')}}" class="btn btn-success">Registrar nueva pizza</a>
        <br><br>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Ingredientes</th>
                    <th>Especialidades</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pizzas as $pizza)
                    <tr>
                        <td>
                            <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$pizza->Foto}}" width="300" alt="">
                        </td>
                        <td>{{$pizza->Nombre}}</td>
                        <td>{{$pizza->Descripcion}}</td>
                        <td>{{$pizza->Ingredientes}}</td>
                        <td>{{$pizza->Especialidades}}</td>
                        <td>{{$pizza->Precio}}</td>
                        <td>
                            <a href="{{url('/pizza/'.$pizza->id.'/edit')}}" class="btn btn-warning">Editar</a>
                            <form action="{{url('/pizza/'.$pizza->id)}}" class="d-inline" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Deseas borrar?')" value="Borrar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!!$pizzas->links()!!}
    </div>
@endsection