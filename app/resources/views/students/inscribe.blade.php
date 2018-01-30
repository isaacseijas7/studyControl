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
            <a href="{{route('students.index')}}">
                Lista estudiantes
            </a>
        </li>
        <li class="breadcrumb-item active">Inscribir Estudiante {{ $student->fullName() }}</li>
    </ol>

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Inscribir Estudiante {{ $student->fullName() }}
                    </div>
                    <div class="card-block">

                        <div class="row">
                            <div class="col-md-12">
                                @include('partials.mensajes')
                            </div>
                        </div>

                        {!! Form::open(['route' => 'inscriptions.store', 'method' => 'POST','id'=>'students_form', 'name'=>'students_form']) !!}

                            <div class="row">
                                <div class="col-md-12">
                                    <h2>Datos del Estudiante</h2>
                                </div>
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Estudiante</th>
                                                <th>Cédula</th>
                                                <th>Genero</th>
                                                <th>Fecha de nacimiento</th>
                                                <th>Edad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $student->fullName() }}</td>
                                                <td>{{ $student->identification }}</td>
                                                <td>{{ $student->gender() }}</td>
                                                <td>{{ $student->birthdate }}</td>
                                                <td>{{ $student->age() }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <input type="hidden" value="{{ $student->student->id }}" name="student_id" id="student_id">

                            <hr>

                            <div class="row">
                                <div class="col-md-6" id="grade_id">
                                    <div class="form-group {{ $errors->has('grade_id') ? ' has-danger' : '' }}"">
                                        {{ Form::label('grade_id', 'Seleccione el grado', ['for' => 'grade_id', 'class'=>'form-control-label']) }}
                                        
                                        {!! Form::select('grade_id', $grades, null, ['class'=> 'form-control', 'id'=> 'grade_id', 'placeholder' => 'Seleccione el grado']) !!}

                                        @if ($errors->has('grade_id'))
                                            <span class="form-control-feedback">{{ $errors->first('grade_id') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6" id="section_id">
                                    <div class="form-group {{ $errors->has('section_id') ? ' has-danger' : '' }}"">
                                        {{ Form::label('section_id', 'Seleccione sección', ['for' => 'section_id', 'class'=>'form-control-label']) }}
                                        
                                        {!! Form::select('section_id', $sections, null, ['class'=> 'form-control', 'id'=> 'section_id', 'placeholder' => 'Seleccione sección']) !!}

                                        @if ($errors->has('section_id'))
                                            <span class="form-control-feedback">{{ $errors->first('section_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Representantes</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('mother_id') ? ' has-danger' : '' }}"">
                                        {{ Form::label('mother_id', 'Madre', ['for' => 'mother_id', 'class'=>'form-control-label']) }}
                                        
                                        {!! Form::select('mother_id', $representatives, null, ['class'=> 'form-control select2-multiple', 'id'=> 'mother_id', 'placeholder' => 'Madre']) !!}

                                        @if ($errors->has('mother_id'))
                                            <span class="form-control-feedback">{{ $errors->first('mother_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('father_id') ? ' has-danger' : '' }}"">
                                        {{ Form::label('father_id', 'Padre', ['for' => 'father_id', 'class'=>'form-control-label']) }}
                                        
                                        {!! Form::select('father_id', $representatives, null, ['class'=> 'form-control select2-multiple', 'id'=> 'father_id', 'placeholder' => 'Padre']) !!}

                                        @if ($errors->has('father_id'))
                                            <span class="form-control-feedback">{{ $errors->first('father_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('auxiliary_id') ? ' has-danger' : '' }}"">
                                        {{ Form::label('auxiliary_id', 'Auxiliar', ['for' => 'auxiliary_id', 'class'=>'form-control-label']) }}
                                        
                                        {!! Form::select('auxiliary_id', $representatives, null, ['class'=> 'form-control select2-multiple', 'id'=> 'auxiliary_id', 'placeholder' => 'Auxiliar']) !!}

                                        @if ($errors->has('auxiliary_id'))
                                            <span class="form-control-feedback">{{ $errors->first('auxiliary_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            
                            <div class="card-footer">
                                {!! Form::submit('Inscribir Estudiante '.$student->fullName(), ['class' => 'btn btn-md btn-primary', 'id' => 'btn_submit']) !!}
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
    <link href="{{ asset('assets/js/libs/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/libs/select2/js/i18n/es.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function() {
            $('.select2').select2();
        });

    </script>

@endsection