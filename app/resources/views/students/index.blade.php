@extends('layouts.app')

@section('content')
<main class="main">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('/')}}">
                Inicio
            </a>
        </li>
        <li class="breadcrumb-item active">Lista estudiantes</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-edit"></i> Lista estudiantes
                    <a class="btn btn-primary pull-right" href="{{ route('students.create') }}">
                        Registrar Estudiante
                    </a>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-12">
                            @include('partials.mensajes')
                        </div>
                    </div>
                    <table id="datatables-students" class="table table-striped table-bordered datatable">
                        <thead>
                            <tr>
                                <th>Estudiante</th>
                                <th>Cédula</th>
                                <th>Genero</th>
                                <th>Fecha de nacimiento</th>
                                <th>Edad</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('styles')
    <link href="{{ asset('assets/js/libs/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/js/libs/buttons.dataTables.min.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/libs/jquery.dataTables.min.js') }}"></script>


    <script src="{{ asset('assets/js/libs/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/js/libs/sweetalert.min.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function() {
            table = $('#datatables-students').DataTable({

                "sDom": "<'row mb-1'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6 center'p>>",
                renderer: 'bootstrap',
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('students.dataTable') }}",
                "columns": [
                    {"data": "ful_name",'name':'ful_name'},
                    {"data": "identification" ,'name':'identification'},
                    {"data": "gender" ,'name':'gender'},
                    {"data": "birthdate" ,'name':'birthdate'},
                    {"data": "age" ,'name':'age'},
                    {"data": "action", "orderable" : false, "searchable": false}
                ],
                "language": {
                    "lengthMenu": "Ver _MENU_ registros por página",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Viendo la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay información",
                    "search": " Buscar: ",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Proximo"
                    },
                }
            });

            $('#datatables-students tbody').on('click', 'a.delete', function(e){
                e.preventDefault();
                var self = $(this);
                swal({
                    title: "Advertencia!",
                    text: "Una vez eliminado no podrá recuperar el registro",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d81b60",
                    confirmButtonText: "Si, eliminala!",
                    cancelButtonText: "No, vuelve atrás!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                }, 
                function(isConfirm){
                    if (isConfirm) {
                        window.location = self.attr('href');
                    }
                });

            });

        });

        


    </script>

@endsection