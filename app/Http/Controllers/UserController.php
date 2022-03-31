<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Direccion;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $datos['direcciones']=Direccion::all()->where('user_id',Auth::id());
        return view('user.index',$datos);
    }

    public function create()
    {
        return view('user.create'); 
    }

    public function store(Request $request)
    {
        $campos=[
            'Nombre'=>'required|string|max:30',
            'CP'=>'required|string|max:5',
            'Colonia'=>'required|string|max:255',
            'Calle'=>'required|string|max:255',
            'Referencias'=>'required|string|max:255',
            'NumExterior'=>'required|string|max:255',
            'Telefono'=>'required|string|max:10',
            'Ciudad'=>'required|string|max:255',
            'Municipio'=>'required|string|max:255',
            'Estado'=>'required|string|max:255',
        ];

        $mensaje=[
            'requited'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);

        $user_id=Auth::id();
        $Nombre = $request->Nombre;
        $CP = $request->CP;
        $Colonia = $request->Colonia;
        $Calle = $request->Calle;
        $Referencias = $request->Referencias;
        $NumExterior = $request->NumExterior;
        $NumInterior = $request->NumInterior;
        $Telefono = $request->Telefono;
        $Ciudad = $request->Ciudad;
        $Municipio = $request->Municipio;
        $Estado = $request->Estado;
        Direccion::insert(['user_id'=>$user_id,
        'Nombre'=>$Nombre,
        'CP'=>$CP,
        'Colonia'=>$Colonia,
        'Calle'=>$Calle,
        'Referencias'=>$Referencias,
        'NumExterior'=>$NumExterior,
        'NumInterior'=>$NumInterior,
        'Telefono'=>$Telefono,
        'Ciudad'=>$Ciudad,
        'Municipio'=>$Municipio,
        'Estado'=>$Estado]);
        return redirect('user')->with('mensaje','Dirección agregada con éxito');
    }

    public function edit($id)
    {
        $direccion=Direccion::findOrFail($id);
        return view('user.edit',compact('direccion'));
    }

    public function update(Request $request, $id)
    {
        $datosDireccion=request()->except(['_token','_method']);
        Direccion::where('id','=',$id)->update($datosDireccion);
        $direccion=Direccion::findOrFail($id);
        return redirect('user')->with('mensaje','Dirección modificada');
    }

    public function destroy($id)
    {
        $datos=Direccion::findOrFail($id);
        Direccion::destroy($id);
        return redirect('user')->with('mensaje','Dirección borrada');
    }
}