@extends('layouts.app')

@section('content')
<main class="main">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('/')}}">
                Inicio
            </a>
        </li>
        <li class="breadcrumb-item active">Tablero</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-block">
                            <div class="h4 m-0">89.9%</div>
                            <div>Lorem ipsum...</div>
                            <div class="progress progress-xs my-1">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small class="text-muted">Lorem ipsum dolor sit amet enim.</small>
                        </div>
                    </div>
                </div>
                <!--/.col-->
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-block">
                            <div class="h4 m-0">12.124</div>
                            <div>Lorem ipsum...</div>
                            <div class="progress progress-xs my-1">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small class="text-muted">Lorem ipsum dolor sit amet enim.</small>
                        </div>
                    </div>
                </div>
                <!--/.col-->
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-block">
                            <div class="h4 m-0">$98.111,00</div>
                            <div>Lorem ipsum...</div>
                            <div class="progress progress-xs my-1">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small class="text-muted">Lorem ipsum dolor sit amet enim.</small>
                        </div>
                    </div>
                </div>
                <!--/.col-->
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-block">
                            <div class="h4 m-0">2 TB</div>
                            <div>Lorem ipsum...</div>
                            <div class="progress progress-xs my-1">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small class="text-muted">Lorem ipsum dolor sit amet enim.</small>
                        </div>
                    </div>
                </div>
                <!--/.col-->
            </div>
        </div>


    </div>
</main>
@endsection
