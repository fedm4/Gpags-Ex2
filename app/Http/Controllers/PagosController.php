<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Pagos as Pago;

class PagosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($msg=null)
    {
        $pagos = Auth::user()->pagos()->get();
        return view('pagos', ['pagos'=>$pagos, 'msg'=>$msg]);
    }

    public function pago($codigopago = null){

      $pago = $codigopago ? Pago::find($codigopago) : null;
      return view('pago', ['pago'=>$pago, 'codigopago'=>$codigopago]);
    }

    public function guardarPago(Request $request){

      $this->validate($request, [
        'importe' => 'required|numeric|min:1',
        'fecha' => 'required|date_format:Y-m-d|after:today',
    	]);


      if($request->route('codigopago') != null){
        $pago = Pago::find($request->route('codigopago'));
        $create = false;
      }else{
        $pago = new Pago;
        $create = true;
      }
      $pago->fecha = $request->input('fecha');
      $pago->importe = $request->input('importe');

      $pago->save();
      if($create){
        $pago->user()->attach(Auth::user());
      }

      return redirect('pagos');
    }

      public function borrarPago(Request $request){
        if($request->route('codigopago') != null){
          $pago = Pago::find($request->route('codigopago'));
          $pago->user()->detach();

          $pago->delete();
        }
        return redirect('pagos');
      }

}
