@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pago</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('pago', ['codigopago'=>$codigopago]) }}" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="form-group{{ $errors->has('importe') ? ' has-error' : '' }}">
                          <label for="importe" class="col-md-4 control-label">Importe</label>

                          <div class="col-md-6">
                              <input id="importe" type="number" class="form-control" name="importe" value="{{ old('importe', isset($pago->importe) ? $pago->importe : null) }}" required autofocus>

                              @if ($errors->has('importe'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('importe') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
                          <label for="fecha" class="col-md-4 control-label">Fecha</label>
                          <div class="col-md-6">
                              <input id="fecha" type="date" class="form-control" name="fecha" value="{{ old('fecha', isset($pago->fecha) ? $pago->fecha : null) }}" required autofocus>

                              @if ($errors->has('fecha'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('fecha') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  Guardar
                              </button>
                          </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
