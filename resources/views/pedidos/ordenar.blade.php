<form action="{{url('compra')}}" method="post">
    @csrf
@include('pedidos.form',['modo'=>'Agregar al carrito'])
</form>