@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Favoritos</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (isset($msg) && $msg != null)
                        <div class="alert alert-success">
                            {{ $msg }}
                        </div>
                    @endif

                    <ul class="list-group">
                      @foreach  ($favoritos as $favorito)
                        <li class="list-group-item">
                          <span style="display: inline-block; width: 49%;">
                            {{ $favorito->usuario }}
                          </span>
                          <form method="post" action="{{ route('borrarfavorito', ['codigousuariofavorito'=> $favorito->codigousuario]) }}" style="display: inline-block; width: 50%; text-align: right;">
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-danger" style="background-color:#d9534f; border-color: #d43f3a;">Borrar</button>
                          </form>
                        </li>
                      @endforeach
                    </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                <div class="panel-heading">Usuarios</div>
                  <div class="panel-body">
                    <ul class="list-group">
                      @foreach  ($usuarios as $usuario)
                        <li class="list-group-item">
                          <span style="display: inline-block; width: 49%;">
                            {{ $usuario->usuario }}
                          </span>
                          <form method="post" action="{{ route('guardarfavorito', ['codigousuariofavorito'=> $usuario->codigousuario]) }}" style="display: inline-block; width: 50%; text-align: right;">
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-success">Agregar a favoritos</button>
                          </form>
                        </li>
                      @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
