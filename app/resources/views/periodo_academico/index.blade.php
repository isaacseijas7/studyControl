@extends('layouts.app')

@section('content')
<main class="main">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('/')}}">
                Home
            </a>
        </li>
        <li class="breadcrumb-item active">Lista Períodos académicos</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <h2>Lista Períodos académicos</h2>

            <a href="{{route('academic_periods.create')}}" class="btn btn-info">
                Crear Período académico
            </a>

        </div>


    </div>
</main>
@endsection
