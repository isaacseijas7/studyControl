@extends('layouts.app')

@section('content')
<main class="main">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('/')}}">
                Inicio
            </a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('workers.index')}}">
                Lista Obreros
            </a>
        </li>
        <li class="breadcrumb-item active"> Registrar Obrero</li>
    </ol>

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Registrar Obrero
                    </div>
                    <div class="card-block">

                        <div class="row">
                            <div class="col-md-12">
                                @include('partials.mensajes')
                            </div>
                        </div>

                        {!! Form::open(['route' => 'workers.store', 'method' => 'POST','id'=>'workers_form', 'name'=>'workers_form']) !!}
                        
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}"">
                                        {{ Form::label('name', 'Nombres:', ['for' => 'name', 'class'=>'control-label']) }}

                                        {{ Form::text('name', old('name'), ['class' => 'form-control', 'id' => 'name' , 'placeholder' => 'Nombres', 'autofocus' => 'autofocus'  ]) }}
                                        
                                        @if ($errors->has('name'))
                                            <span class="form-control-feedback">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('last_name') ? ' has-danger' : '' }}"">
                                        {{ Form::label('last_name', 'Apellidos:', ['for' => 'last_name', 'class'=>'control-label']) }}

                                        {{ Form::text('last_name', old('last_name'), ['class' => 'form-control', 'id' => 'last_name' , 'placeholder' => 'Apellidos' ]) }}
                                        
                                        @if ($errors->has('last_name'))
                                            <span class="form-control-feedback">{{ $errors->first('last_name') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('identification') ? ' has-danger' : '' }}"">
                                        {{ Form::label('identification', 'Cédula:', ['for' => 'identification', 'class'=>'control-label']) }}

                                        {{ Form::text('identification', old('identification'), ['class' => 'form-control', 'id' => 'identification' , 'placeholder' => 'Cédula' ]) }}
                                        
                                        @if ($errors->has('identification'))
                                            <span class="form-control-feedback">{{ $errors->first('identification') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('gender') ? ' has-danger' : '' }}">
                                        {{ Form::label('gender', 'Sexo', ['for' => 'gender', 'class'=>'control-label']) }}
                                        
                                        {!! Form::select('gender', ['Female' => 'Femenino', 'Male' => 'Masculino'], null, ['class'=> 'form-control', 'id'=> 'gender', 'placeholder' => 'Seleccione']) !!}

                                        @if ($errors->has('gender'))
                                            <span class="form-control-feedback">{{ $errors->first('gender') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('birthdate') ? ' has-danger' : '' }}"">
                                        {{ Form::label('birthdate', 'Fecha de nacimiento:', ['for' => 'birthdate', 'class'=>'control-label']) }}

                                        {{ Form::text('birthdate', old('birthdate'), ['class' => 'form-control', 'id' => 'birthdate' , 'placeholder' => 'Ingrese fecha de nacimiento', 'data-date-end-date'=>'0d', 'data-date-disable-touch-keyboard'=>'false' ]) }}
                                        
                                        @if ($errors->has('birthdate'))
                                            <span class="form-control-feedback">{{ $errors->first('birthdate') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('domicile') ? ' has-danger' : '' }}"">
                                        {{ Form::label('domicile', 'Dirección:', ['for' => 'domicile', 'class'=>'control-label']) }}

                                        {{ Form::textarea('domicile', old('domicile'), ['class' => 'form-control', 'id' => 'domicile' , 'placeholder' => 'Ingrese dirección' ]) }}
                                        
                                        @if ($errors->has('domicile'))
                                            <span class="form-control-feedback">{{ $errors->first('domicile') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('phone_local') ? ' has-danger' : '' }}"">
                                        {{ Form::label('phone_local', 'Teléfono local:', ['for' => 'phone_local', 'class'=>'control-label']) }}

                                        {{ Form::text('phone_local', old('phone_local'), ['class' => 'form-control', 'id' => 'phone_local' , 'placeholder' => 'Teléfono local' ]) }}
                                        
                                        @if ($errors->has('phone_local'))
                                            <span class="form-control-feedback">{{ $errors->first('phone_local') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('phone_movil') ? ' has-danger' : '' }}"">
                                        {{ Form::label('phone_movil', 'Teléfono movil:', ['for' => 'phone_movil', 'class'=>'control-label']) }}

                                        {{ Form::text('phone_movil', old('phone_movil'), ['class' => 'form-control', 'id' => 'phone_movil' , 'placeholder' => 'Teléfono movil' ]) }}
                                        
                                        @if ($errors->has('phone_movil'))
                                            <span class="form-control-feedback">{{ $errors->first('phone_movil') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-footer">
                                {!! Form::submit('Registrar Obrero', ['class' => 'btn btn-md btn-primary', 'id' => 'btn_submit']) !!}
                                <a href="#" onclick="history.go(-1);return false;" class="btn btn-md btn-warning">Regresar</a>
                            </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection

@section('styles')
    <link href="{{ asset('assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('scripts')
    <script src="{{ asset('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js') }}" type="text/javascript"></script>

    <script>
        
        $('#birthdate').datepicker({
            language: 'es',
            autoclose: true,
            format: 'yyyy/mm/dd',
            disableTouchKeyboard: false,
        });

    </script>

@endsection