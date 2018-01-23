@extends('layouts.app')

@section('content')
<main class="main">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('/')}}">
                Home
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
                            <form method="POST" action="{{ route('academic_periods.store') }}">
                                {{ csrf_field() }}
                            

                                <div class="input-group form-group {{ $errors->has('academic_period') ? ' has-danger' : '' }}">
                                    <input id="academic_period" type="academic_period" class="form-control" name="academic_period" placeholder="Período académico" autofocus>
                                </div>

                                @if ($errors->has('academic_period'))
                                    <em class="form-control-feedback" style="color: red;">
                                        {{ $errors->first('academic_period') }}
                                    </em>
                                @endif


                                <div class="form-group form-actions">
                                    <button type="submit" class="btn btn-sm btn-info">Crear</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</main>
@endsection
