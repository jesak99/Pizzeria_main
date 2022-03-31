<form action="{{url('/user')}}" method="post" enctype="multipart/form-data">
@csrf
@include('user.form',['modo'=>'Crear'])
</form>