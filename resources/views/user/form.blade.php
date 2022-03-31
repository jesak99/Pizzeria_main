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
    </style>
    <div class="container">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($modo)}} dirección
        </h2>
            
        @if(count($errors)>0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-2">
                <div class="form-group">
                    <label for="Nombre">Nombre:</label>
                    <input type="text" placeholder="Ej. Casa, Oficina, etc" class="form-control" name="Nombre" value="{{isset($direccion->Nombre)?$direccion->Nombre:old('Nombre')}}" id="Nombre" required>
                </div>
            </div>

            <div class="col-2">
                <div class="form-group">
                    <label for="CP">Código Postal:</label>
                    <input type="text" placeholder="Ej. 00000" class="form-control" name="CP" value="{{isset($direccion->CP)?$direccion->CP:old('CP')}}" id="CP" required>
                </div>
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label for="Colonia">Colonia:</label>
                    <input type="text" placeholder="Nombre de la colonia" class="form-control" name="Colonia" value="{{isset($direccion->Colonia)?$direccion->Colonia:old('Colonia')}}" id="Colonia" required>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="Calle">Calle:</label>
                    <input type="text" placeholder="Nombre de la calle" class="form-control" name="Calle" value="{{isset($direccion->Calle)?$direccion->Calle:old('Calle')}}" id="Calle" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-5">
                <div class="form-group">
                    <label for="Referencias">Referencias y/o entre calles:</label>
                    <input type="text" placeholder="Ej. Esquina con calle Hidalgo, casa blanca, etc." class="form-control" name="Referencias" value="{{isset($direccion->Referencias)?$direccion->Referencias:old('Referencias')}}" id="Referencias" required>
                </div>
            </div>

            <div class="col-2">
                <div class="form-group">
                    <label for="NumExterior">Número Exterior:</label>
                    <input type="text" placeholder="Ej. 123" class="form-control" name="NumExterior" value="{{isset($direccion->NumExterior)?$direccion->NumExterior:old('NumExterior')}}" id="NumExterior" required>
                </div>
            </div>

            <div class="col-2">
                <div class="form-group">
                    <label for="NumInterior">Número Interior:</label>
                    <input type="text" placeholder="Ej. Departamento 4" class="form-control" name="NumInterior" value="{{isset($direccion->NumInterior)?$direccion->NumInterior:old('NumInterior')}}" id="NumInterior">
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="Telefono">Teléfono:</label>
                    <input type="tel" placeholder="Ej. 123 456 7890" class="form-control" name="Telefono" value="{{isset($direccion->Telefono)?$direccion->Telefono:old('Telefono')}}" id="Telefono" pattern="[0-9]{10}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="Ciudad">Ciudad:</label>
                    <input type="text" placeholder="Nombre de la ciudad" class="form-control" name="Ciudad" value="{{isset($direccion->Ciudad)?$direccion->Ciudad:old('Ciudad')}}" id="Ciudad" required>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="Municipio">Municipio:</label>
                    <input type="text" placeholder="Nombre del municipio" class="form-control" name="Municipio" value="{{isset($direccion->Municipio)?$direccion->Municipio:old('Municipio')}}" id="Municipio" required>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="Estado">Estado:</label>
                    <input type="text" placeholder="Nombre del estado" class="form-control" name="Estado" value="{{isset($direccion->Estado)?$direccion->Estado:old('Estado')}}" id="Estado" required>
                </div>
            </div>
        </div>

        <input class="btn btn-success" type="submit" value="{{$modo}} datos">
        <a class="btn btn-primary" href="{{url('user')}}">Regresar</a>

    </div>
@endsection