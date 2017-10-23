@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pagos</div>

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
                      @foreach  ($pagos as $pago)
                        <li class="list-group-item">
                          <a href="{{ route('pago', ['codigopago'=> $pago->codigopago]) }}" style="width: 49%;display:inline-block;">
                            {{ $pago->importe }} - {{ $pago->fecha }}
                          </a>

                          <form method="post" action="{{ route('borrarpago', ['codigopago'=> $pago->codigopago]) }}" style="display: inline-block; width: 50%; text-align: right;">
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-danger" style="background-color:#d9534f; border-color: #d43f3a;">Borrar</button>
                          </form>
                        </li>
                      @endforeach
                    </ul>
                    <a href="{{ route('pago') }}">Nuevo Pago</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
