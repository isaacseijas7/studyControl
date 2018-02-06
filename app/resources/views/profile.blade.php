@extends('layouts.app')

@section('content')


<main class="main">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('/')}}">
                Home
            </a>
        </li>
		<li class="breadcrumb-item active">
            <a href="{{ route('home') }}">Tablero</a>
        </li>
		<li class="breadcrumb-item active">Perfil</li>
	</ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
				<div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <strong>Perfil</strong>
                            <small>editar cuenta</small>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @include('partials.mensajes')
                            </div>
						</div>

						{!! Form::open(['route' => 'profile.update', 'class' => 'form-horizontal', 'method' => 'POST','id'=>'acount_form', 'name'=>'acount_form']) !!}

							<div class="card-block">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                                            {{ Form::label('password', 'Contraseña nueva:', ['for' => 'password', 'class'=>'form-control-label']) }}

                                            <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña nueva *" autofocus>
                                            
                                            @if ($errors->has('password'))
                                                <span class="form-control-feedback">{{ $errors->first('password') }}</span>
                                            @endif
										</div>
										<div class="form-group {{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                                            {{ Form::label('password_confirmation', 'Confirmar contraseña:', ['for' => 'password_confirmation', 'class'=>'form-control-label']) }}

                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña *">
                                            
                                            @if ($errors->has('password_confirmation'))
                                                <span class="form-control-feedback">{{ $errors->first('password_confirmation') }}</span>
                                            @endif
                                        </div>
									</div>
								</div>
							</div>

							<div class="card-footer">
                                {!! Form::submit('Editar', ['class' => 'btn btn-sm btn-primary', 'id' => 'btn_submit']) !!}
                            </div>
                        {!! Form::close() !!}
						
                    </div>

                </div>
			</div>
        </div>
    </div>
</main>


@endsection
