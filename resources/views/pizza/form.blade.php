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
        <h2>
            {{ __($modo)}} pizza
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
            <div class="col-4">
                <div class="form-group">
                    <label for="Nombre">Nombre:</label>
                    <input type="text" placeholder="Nombre de la pizza" class="form-control" name="Nombre" value="{{isset($pizza->Nombre)?$pizza->Nombre:old('Nombre')}}" id="Nombre" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="Descripcion">Descripción:</label>
                    <input type="text" placeholder="Ej. La combinación perfecta entre Pepperoni y Champiñones, con un gran sabor y horneado al momento." class="form-control" name="Descripcion" value="{{isset($pizza->Descripcion)?$pizza->Descripcion:old('Descripcion')}}" id="Descripcion" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <div class="form-group">
                    <label for="Ingredientes">Ingredientes:</label>
                    <input type="text" placeholder="Ej. Pepperoni, Champiñones Frescos y Extra Queso" class="form-control" name="Ingredientes" value="{{isset($pizza->Ingredientes)?$pizza->Ingredientes:old('Ingredientes')}}" id="Ingredientes" required>
                 </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="Especialidades">Especialidades:</label>
                    <input type="text" placeholder="2 a 4 ings. o 5 a 9 ings." class="form-control" name="Especialidades" value="{{isset($pizza->Especialidades)?$pizza->Especialidades:old('Especialidades')}}" id="Especialidades" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-2">
                <div class="form-group">
                    <label for="Precio">Precio:</label>
                    <input type="text" placeholder="Ej. 200" class="form-control" name="Precio" value="{{isset($pizza->Precio)?$pizza->Precio:old('Precio')}}" id="Precio" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="Foto">Foto:</label><br>
                    @if(isset($pizza->Foto))
                        <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$pizza->Foto}}" width="200" alt="">
                    @endif
                    <input type="file" class="btn btn-light" name="Foto" value="" id="Foto">
                    <br>
                </div>
            </div>
        </div>

        <input class="btn btn-success" type="submit" value="{{$modo}} datos">
        <a class="btn btn-primary" href="{{url('pizza')}}">Regresar</a>

    </div>
@endsection