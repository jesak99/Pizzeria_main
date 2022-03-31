<form action="{{url('/user/'.$direccion->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
@include('user.form',['modo'=>'Editar'])
</form>