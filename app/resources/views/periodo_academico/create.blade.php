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
            <a href="{{route('academic_periods.index')}}">
                Lista Períodos académicos
            </a>
        </li>
        <li class="breadcrumb-item active">Crear Período académico</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Crear Período académico</h2>
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('partials.mensajes')
                                </div>
                            </div>

                            {!! Form::open(['route' => 'academic_periods.store', 'method' => 'POST','id'=>'academic_periods_form', 'name'=>'academic_periods_form']) !!}

                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4">
                                        
                                        <div class="form-group {{ $errors->has('academic_period') ? ' has-danger' : '' }}"">
                                            {{ Form::label('academic_period', 'Período académico:', ['for' => 'academic_period', 'class'=>'control-label']) }}

                                            {{ Form::text('academic_period', old('academic_period'), ['class' => 'form-control', 'id' => 'academic_period' , 'placeholder' => 'Período académico', 'autofocus' => 'autofocus'  ]) }}
                                            
                                            @if ($errors->has('academic_period'))
                                                <span class="form-control-feedback">{{ $errors->first('academic_period') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group {{ $errors->has('director') ? ' has-danger' : '' }}"">
                                            {{ Form::label('director', 'Nombre del director:', ['for' => 'director', 'class'=>'control-label']) }}

                                            {{ Form::text('director', old('director'), ['class' => 'form-control', 'id' => 'director' , 'placeholder' => 'Nombre del director', 'autofocus' => 'autofocus'  ]) }}
                                            
                                            @if ($errors->has('director'))
                                                <span class="form-control-feedback">{{ $errors->first('director') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group {{ $errors->has('ci_director') ? ' has-danger' : '' }}"">
                                            {{ Form::label('ci_director', 'Cedula del ci_director:', ['for' => 'ci_director', 'class'=>'control-label']) }}

                                            {{ Form::text('ci_director', old('ci_director'), ['class' => 'form-control', 'id' => 'ci_director' , 'placeholder' => 'Cedula del ci_director', 'autofocus' => 'autofocus'  ]) }}
                                            
                                            @if ($errors->has('ci_director'))
                                                <span class="form-control-feedback">{{ $errors->first('ci_director') }}</span>
                                            @endif
                                        </div>

                                        <div class="input-group input-daterange">

                                            {{ Form::text('date_int', old('date_int'), ['class' => 'form-control', 'id' => 'date_int' , 'placeholder' => 'Feha de inicio', 'autofocus' => 'autofocus'  ]) }}


                                            <div class="input-group-addon">to</div>
                                            
                                            {{ Form::text('date_fin', old('date_fin'), ['class' => 'form-control', 'id' => 'date_fin' , 'placeholder' => 'Fecha final', 'autofocus' => 'autofocus'  ]) }}


                                        </div>

                                        @if ($errors->has('date_int'))
                                            <span class="form-control-feedback">{{ $errors->first('date_int') }}</span>
                                        @endif

                                        @if ($errors->has('date_fin'))
                                            <span class="form-control-feedback">{{ $errors->first('date_fin') }}</span>
                                        @endif

                                        <div class="card-footer">
                                            {!! Form::submit('Crear Período académico', ['class' => 'btn btn-md btn-primary', 'id' => 'btn_submit']) !!}
                                            <a href="#" onclick="history.go(-1);return false;" class="btn btn-md btn-warning">Regresar</a>
                                        </div>
                                        
                                        
                                    </div>
                                </div>

                            
                            {!! Form::close() !!}
                        </div>
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
    <script src="{{ asset('assets/js/libs/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js') }}" type="text/javascript"></script>

    <script>



        $('.input-daterange input').each(function() {
            $(this).datepicker({
                language: 'es',
                autoclose: true,
                format: 'yyyy/mm/dd',
            });
        });

        /*var $start = $(".input-daterange").find('#date_int');
        var $end = $(".input-daterange").find('#date_fin');

        $end.on('show', function(e){
            console.log(e);
            var date = $start.datepicker('getDate');
                date = moment(date).add(3, 'months').toDate();
            $end.datepicker('setEndDate', date);
        });*/

    </script>

@endsection