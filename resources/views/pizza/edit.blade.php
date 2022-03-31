<form action="{{url('/pizza/'.$pizza->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
@include('pizza.form',['modo'=>'Editar'])
</form>