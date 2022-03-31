<form action="{{url('/pizza')}}" method="post" enctype="multipart/form-data">
@csrf
@include('pizza.form',['modo'=>'Crear'])
</form>