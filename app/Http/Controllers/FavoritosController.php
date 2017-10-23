<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Auth;
use App\User;

class FavoritosController extends Controller
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
        //listado de favoritos
        $favoritosId = DB::table('favoritos')->select(['codigousuariofavorito'])->where('codigousuario', Auth::id())->get()->toArray();
        $favoritosId = json_decode(json_encode($favoritosId), true);
        $favoritos = Auth::user()->favoritos()->get();
        $usuarios = User::where('codigousuario', '!=', Auth::id())
                    ->whereNotIn('codigousuario',$favoritosId)
                    ->get();
        return view('favoritos', ['usuarios'=>$usuarios, 'favoritos'=>$favoritos, 'msg'=>$msg]);
    }

    public function guardarFavorito(Request $request){
      $user = Auth::user();
      if($request->route('codigousuariofavorito') != null){
        $user->favoritos()->attach($request->route('codigousuariofavorito'));
      }
      return redirect('favoritos');
    }

      public function borrarFavorito(Request $request){
        $user = Auth::user();
        if($request->route('codigousuariofavorito') != null){
          $user->favoritos()->detach($request->route('codigousuariofavorito'));
        }
        return redirect('favoritos');
      }

}
