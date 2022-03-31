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

    h4 {
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
</style>
    <h2>{{$pizza->Nombre}}</h2>
    <h4>{{$pizza->Ingredientes}}</h4>
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <img class="rounded" src="{{asset('storage').'/'.$pizza->Foto}}" width="300" height="170" alt="">
        </div>
        <div class="col">
            <h5>Tamaño</h5>
            <div>
            <input type="radio" name="tamanio" value="1" id="TamC" checked>
            <label for="TamC">Chica 25 cm</label>
            <input type="radio" name="tamanio" value="1.3" id="TamM" <?php if(isset($compra)){ if($compra->tamanio=='1.3'){echo "checked" ;}} ?>>
            <label for="TamM">Mediana 35 cm</label>
            <input type="radio" name="tamanio" value="1.7" id="TamG" <?php if(isset($compra)){ if($compra->tamanio=='1.7'){echo "checked" ;}} ?>>
            <label for="TamG">Grande 45 cm</label>
            </div>
        </div>
        <div class="col"></div>
    </div>
    <div class="row">
        <div class="col">
            <center>
                <h5>Cantidad</h5>
                <div class="number-input">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"></button>
                    <input type="number" class="quantity" min="1" max="20" name="quantity" value="{{isset($compra)? $compra->cantidad:'1'}}" id="quantity" name="quantity">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                </div>
            </center>
        </div>
        <div class="col">
            <center>
                <input type="hidden" name="idpizza" value="{{$pizza->id}}">
                <input type="hidden" name="pp" id="pp" value="{{$pizza->Precio}}">
                <input type="hidden" name="total" id="total" value= "{{$pizza->Precio}}">
                <h3 id="t">${{isset($compra)?$compra->total:$pizza->Precio}}</h3>
            </center>
        </div>
    </div> 
    <div class="row justify-content-end">
        <div class="col-1">
            <a href="/" class="btn btn-primary">Regresar</a>
        </div>
        <div class="col-3">
            <input class="btn btn-success" type="submit" value="{{$modo}}">
        </div>
    </div> 
<script>
    function calc(){
        var $cantidad = (document.getElementById("quantity").value);
        $tamanio =$('input[name="tamanio"]:checked').val();
        $precio = (document.getElementById("pp").value);
        $total = parseFloat($cantidad)*parseFloat($tamanio)*parseFloat($precio);
        return $total;
    }; 
    var buttons = document.querySelectorAll('form button:not([type="submit"])');
    for (i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener('click', function(e) {
            document.getElementById('t').textContent = '$'+calc()+'.00';
            document.getElementById('total').value = calc();
            e.preventDefault();
        });
    }
    var rbuttons = document.querySelectorAll('input[type="radio"]').forEach((elem)=>{
        elem.addEventListener('change', function(e) {
            document.getElementById('t').textContent = '$'+calc()+'.00';
            document.getElementById('total').value = calc();
        })
    });

</script>
@endsection