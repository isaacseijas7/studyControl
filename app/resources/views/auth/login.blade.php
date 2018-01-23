@extends('layouts.auth')


@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card  mx-2">
            <div class="card-block" style="margin: auto;">
				<a href="{{ url('/') }}">
                    <img src="{{asset('assets/img/logoEscuela.png')}}" class="img-fluid" alt="{{ config('app.name', 'Laravel') }}">            
                </a>
                <hr> <span>Acceso a la Administración</span> <br><br>
                <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                    <div class="input-group form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                        <span class="input-group-addon"><i class="icon-user"></i>
                        </span>
                        <input id="email" type="email" class="form-control" name="email" placeholder="Ingrese usuario" autofocus>
                    </div>
                    
                    @if ($errors->has('email'))
                        <em class="form-control-feedback" style="color: red;">
                            {{ $errors->first('email') }}
                        </em>
                    @endif

                    <div class="input-group form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                        <span class="input-group-addon"><i class="icon-lock"></i>
                        </span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Ingrese la contraseña">
					</div>
					
					@if ($errors->has('password'))
						<em class="form-control-feedback" style="color: red;">
							{{ $errors->first('password') }}
						</em>
					@endif

                    <button type="submit" style="margin-top: 10px;" class="btn btn-block btn-primary">Acceder</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
