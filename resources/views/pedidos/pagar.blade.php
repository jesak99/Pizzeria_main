@extends('layouts.app')

@section('content')
<style>
    h2 {
        color: rgb(227, 24, 55);
        text-align: center;
    }

    h3 {
        color: rgb(38, 175, 39);
        text-align: center;
    }

    h4{
        color: rgb(227, 24, 55);
        text-align: center;
    }

    h5 {
        color: rgb(0, 100, 145);
        text-transform: uppercase;
        font-weight: bold;
    }

    .row {
        margin: 20px;
        border-top: 2px solid;
        color: rgb(0, 100, 145);
    }

    .col {
        margin: 15px;
    }

    .btn {
        margin: 15px;
    }

    input[type="number"] {
        -webkit-appearance: textfield;
        -moz-appearance: textfield;
        appearance: textfield;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
    }

    .number-input {
        border: 2px solid #ddd;
        display: inline-flex;
    }

    .number-input,
    .number-input * {
        box-sizing: border-box;
    }

    .number-input button {
        outline: none;
        -webkit-appearance: none;
        background-color: transparent;
        border: none;
        align-items: center;
        justify-content: center;
        width: 2rem;
        height: 2rem;
        cursor: pointer;
        margin: 0;
        position: relative;
    }

    .number-input button:before,
    .number-input button:after {
        display: inline-block;
        position: absolute;
        content: '';
        width: 1rem;
        height: 2px;
        background-color: rgb(0, 100, 145);
        transform: translate(-50%, -50%);
    }

    .number-input button.plus:after {
        transform: translate(-50%, -50%) rotate(90deg);
    }

    .number-input input[type=number] {
        max-width: 5rem;
        padding: .5rem;
        border: solid #ddd;
        border-width: 0 2px;
        font-size: 1rem;
        height: 2rem;
        text-align: center;
    }

    input[type=radio] {
        display: none;
    }

    label {
        display: flex;
        margin: 4px;
        padding: 8px;
        background: transparent;
        color: rgb(0, 100, 145);
        min-width: 100px;
        cursor: pointer;
        border: 1px solid;
        font-weight: bold;
        font-size: 1rem;
    }

    label:hover {
        background: rgb(0, 100, 145);
        color: white;
        font-weight: bold;
        font-size: 1rem;
    }

    input[type=radio]:checked+label {
        background: rgb(228, 228, 228);
        color: rgb(77, 77, 77);
        font-weight: bold;
        font-size: 1rem;
    }
    span{
        color: rgb(227, 24, 55);
        text-align: center;
        font-size: 2rem;
    }
</style>
<h2>Por el momento no contamos con entrega a domicilio, disculpe las molestias</h2>
<div class="row">
    <div class="col">
    <h3>Puede encontrarnos en la siguiente direccion</h3>
    <br>
    <center><img class="rounded" src="https://i.ibb.co/6gHgdB9/direccion.jpg" width="1400" height="700" alt=""></center>
</div>
</div>
<div class="row">
    <div class="col"></div>
    <div class="col">
        <h5>Total a pagar:</h5><span>${{$total}}.00</span>
    </div>
    <div class="col">
        <h5>Metodo de entrega</h5>
        <div>
            <input type="radio" name="entrega" value="0" id="ent" checked>
            <label for="TamC">Recoje tu orden</label>
            <input type="radio" name="entrega" value="1" id="env" disabled>
            <label for="TamM">Llevamos tu orden</label>
        </div>
    </div>
    <div class="col"></div>

</div>
<div class="row justify-content-end">
    <div class="col-1">
        <a href="{{url('ordenes') }}" class="btn btn-primary">Regresar</a>
    </div>
    <div class="col-3">
        <a href="{{url('pedidos/'.$total.'/store')}}" class="btn btn-success">Ordenar</a>
    </div>
</div>


@endsection