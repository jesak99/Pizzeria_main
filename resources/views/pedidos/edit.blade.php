<form action="{{url('editcomp')}}" method="post">
    @csrf
@include('pedidos.form',['modo'=>'Actualizar datos'])
</form>