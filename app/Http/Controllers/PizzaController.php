<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Index de registros
    public function index()
    {
        //
        $datos['pizzas']=Pizza::paginate(4);
        return view('pizza.index',$datos);
    }
    //Index para las ventas
    public function indexP()
    {
        //
        $datos['pizzas']=Pizza::all()->where('Especialidades','2 a 4 ings.');
        $datos2['pizzas2']=Pizza::all()->where('Especialidades','5 a 9 ings.');
        return view('pizza.pizzas',$datos,$datos2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pizza.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'Nombre'=>'required|string|max:30',
            'Descripcion'=>'required|string|max:255',
            'Ingredientes'=>'required|string|max:255',
            'Especialidades'=>'required|in:2 a 4 ings.,5 a 9 ings.',
            'Precio'=>'required|between:0,500.99',
            'Foto'=>'required|max:10000|mimes:jpeg,png,jpg'
        ];

        $mensaje=[
            'requited'=>'El :attribute es requerido',
            'Foto.required'=>'La foto es requerida'
        ];

        $this->validate($request,$campos,$mensaje);
        //
        $datosPizza=request()->except('_token');
        if($request->hasFile('Foto')){
            $datosPizza['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Pizza::insert($datosPizza);
        return redirect('pizza')->with('mensaje','Pizza agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function show(Pizza $pizza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pizza=Pizza::findOrFail($id);
        return view('pizza.edit',compact('pizza'));
    }

    public function ordenar($id){
        $pizza=Pizza::all()->where('id',$id)->first();
        return view('pizza/ordenar')->with('pizza',$pizza);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre'=>'required|string|max:30',
            'Descripcion'=>'required|string|max:255',
            'Ingredientes'=>'required|string|max:255',
            'Especialidades'=>'required|in:2 a 4 ings.,5 a 9 ings.',
            'Precio'=>'required|between:0,500.99'
        ];

        $mensaje=[
            'requited'=>'El :attribute es requerido',
            'Foto.required'=>'La foto es requerida'
        ];

        if($request->hasFile('Foto')){
            $campos=['Foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Foto.required'=>'La foto es requerida'];
        }

        $this->validate($request,$campos,$mensaje);
        //
        $datosPizza=request()->except(['_token','_method']);
        if($request->hasFile('Foto')){
            $pizza=Pizza::findOrFail($id);
            Storage::delete(['public/'.$pizza->Foto]);
            $datosPizza['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Pizza::where('id','=',$id)->update($datosPizza);
        $pizza=Pizza::findOrFail($id);
        //return view('pizza.edit',compact('pizza'));
        return redirect('pizza')->with('mensaje','Pizza modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pizza=Pizza::findOrFail($id);
        if(Storage::delete('public/'.$pizza->Foto)){
            Pizza::destroy($id);
        }
        return redirect('pizza')->with('mensaje','Pizza borrada');
    }
}