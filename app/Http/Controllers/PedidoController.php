<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Pizza;
use App\Models\Compra;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $user = User::all()->where('id',auth()->id())->first();
        if($user->fullacces=='yes'){
            $pedidos = Pedido::all();
        }
        else{
            $iduser = auth()->id();
            $pedidos = Pedido::all()->where('user_id',$iduser);
        }
        return view('pedidos.index')->with('pedidos', $pedidos);
    }
    public function ordenes()
    {
    $iduser = auth()->id();
        if(null==Pedido::select('id')->where('user_id',$iduser)->where('estado','creando')->first()){
            return redirect()->to('/');
        }
        $pedido = Pedido::select('id')->where('user_id',$iduser)->where('estado','creando')->first();
        $datos['id'] = $pedido->id;
        $datos['compras']=DB::table('compras')->join('pedidos','compras.pedidos_id','pedidos.id')->where('pedidos.id',$pedido->id)->
        join('pizzas','compras.pizzas_id','pizzas.id')->
        select('compras.*','pizzas.nombre','pizzas.descripcion','pizzas.foto')->get();
        return view('pedidos.ordenes',$datos);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create($id){
        $iduser = auth()->id();
        if(null==Pedido::select('id')->where('user_id',$iduser)->where('estado','creando')->first()){
            Pedido::create([
                'user_id'=>$iduser,'estado'=>'creando'
            ]);
        } 
        $pizza=Pizza::all()->where('id',$id)->first();
        return view('pedidos/ordenar')->with('pizza',$pizza)->with('compra');
    }   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Se paga
    public function pagar($total){ 
        
        return view('pedidos/pagar')->with('total',$total);
    }
    public function detalles($id){ 
        $compras = DB::table('compras')->join('pizzas','pizzas.id','compras.pizzas_id')->select('*')->where('pedidos_id',$id)->get();
        return view('pedidos/detalles')->with('compras',$compras);
    }
    public function aceptar($id){
        $pedido = Pedido::all()->where('id',$id)->first()->update([
            'estado' => 'aceptada'
        ]);
        return redirect()->back();
    }
       public function rechazar($id){
        $pedido = Pedido::all()->where('id',$id)->first()->update([
            'estado' => 'rechazado'
        ]);
        return redirect()->back();
    }

   public function entregar($id){
        $pedido = Pedido::all()->where('id',$id)->first()->update([
            'estado' => 'entregado'
        ]);
        return redirect()->back();
    }

   public function preparada($id){
        $pedido = Pedido::all()->where('id',$id)->first()->update([
            'estado' => 'listo para recoger'
        ]);
        return redirect()->back();
    }

    public function store($total)
    {
        $iduser = auth()->id();
        $fechaac = date('Y-m-d H:i:s');
        if($total==0){
            return redirect()->to('/')->with('mensaje','No has seleccionado ninguna pizza');
        }
        $pedido = Pedido::all()->where('user_id',$iduser)->where('estado','creando')->first()
        ->update([
            'fecha'=>$fechaac,'total'=>$total,'estado'=>'en espera','entrega'=>'lugar'
        ]);
        return redirect()->to('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

//Se agregan las compras
    public function compra(Request $request){
        $idpizza = $request->idpizza;
        $cantidad = $request->quantity;
        $total = $request->total;
        $tamanio = $request->tamanio;
        $iduser = auth()->id();
        $pedido = Pedido::select('id')->where('user_id',$iduser)->where('estado','creando')->first();
        $idpedido = $pedido->id;
        if(null==Compra::select('pizzas_id')->where('pizzas_id',$idpizza)->where('pedidos_id',$idpedido)->where('tamanio',$tamanio)->first()){
            Compra::create([
                'pedidos_id'=>$idpedido,'pizzas_id'=>$idpizza,'cantidad'=>$cantidad,'tamanio'=>$tamanio,'total'=>$total
            ]);
        }
        else{
                $com = Compra::select('cantidad','total')->where('pizzas_id',$idpizza)->where('pedidos_id',$idpedido)->where('tamanio',$tamanio)->first();
                $cantidad = floatval($cantidad ) + floatval($com->cantidad);
                $total = floatval($total ) + floatval($com->total);
                Compra::select('cantidad,tamanio,precio')->where('pizzas_id',$idpizza)->where('pedidos_id',$idpedido)->where('tamanio',$tamanio)
                ->update(['cantidad'=>$cantidad,'total'=>$total]);
        }
        return redirect()->to('/');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$tamanio)
    {
        $pizza=Pizza::all()->where('id','=',$id)->first();
        $pedido = Pedido::select('id')->where('user_id',auth()->id())->where('estado','creando')->first();
        $compra = Compra::select('cantidad','tamanio','total')->where('pizzas_id',$pizza->id)->where('pedidos_id',$pedido->id)->where('tamanio',$tamanio)->first();

        return view('pedidos/edit')->with('pizza',$pizza)->with('compra',$compra);
    }
    public function editcomp(Request $request){
        $iduser = auth()->id();
        $pedido = Pedido::select('id')->where('user_id',$iduser)->where('estado','creando')->first();
        $idpedido = $pedido->id;
        $idpizza = $request->idpizza;
        $tamanio = $request->tamanio;
        $cantidad = $request->quantity;
        $total = $request->total;
        Compra::select('cantidad,tamanio,precio')->where('pizzas_id',$idpizza)->where('pedidos_id',$idpedido)->where('tamanio',$tamanio)
        ->update(['cantidad'=>$cantidad,'total'=>$total]);
        return redirect()->to('ordenes')->with('mensaje','Registro actualizado');
    }
    public function elimcomp($id,$tamanio){
        $iduser = auth()->id();
        $pedido = Pedido::select('id')->where('user_id',$iduser)->where('estado','creando')->first();
        $idpedido = $pedido->id; 
        Compra::select('*')->where('pedidos_id',$idpedido)->where('pizzas_id',$id)->where('tamanio',$tamanio)->delete();
        return redirect()->to('ordenes')->with('mensaje','Registro eliminado');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $request;   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
