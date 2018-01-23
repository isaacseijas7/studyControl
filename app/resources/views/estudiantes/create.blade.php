@extends('layouts.app')

@section('content')
<main class="main">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('/')}}">
                Home
            </a>
        </li>
        <li class="breadcrumb-item active"> Inscripción Nuevo</li>
    </ol>

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Datos Repesentante
                    </div>
                    <div class="card-block">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nombres" autofocus>
                            </div>
                            <div class="form-group">
                                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Apellidos">
                            </div>
                            <div class="form-group">
                                <input type="text" id="identification" name="identification" class="form-control" placeholder="Cédula">
                            </div>
                            <div class="form-group">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">Genero</option>
                                    <option value="Female">Femenino</option>
                                    <option value="Male">Masculino</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="date" id="birthdate" name="birthdate" class="form-control" placeholder="Fecha de nacimiento">
                            </div>
                            <div class="form-group">
                                <input type="text" id="location" name="location" class="form-control" placeholder="Estado">
                            </div>
                            <div class="form-group">
                                <textarea id="location" name="location" class="form-control" placeholder="Dirección"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" id="phone_local" name="phone_local" class="form-control" placeholder="Teléfono Local">
                            </div>
                            <div class="form-group">
                                <input type="text" id="phone_movil" name="phone_movil" class="form-control" placeholder="Teléfono Movil">
                            </div>
                            <div class="form-group">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">Parentesco</option>
                                    <option value="mother">Madre</option>
                                    <option value="father">Padre</option>
                                    <option value="auxiliary">Auxiliar</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" id="profession" name="profession" class="form-control" placeholder="Profesión">
                            </div>
                            <div class="form-group">
                                <textarea id="work_place" name="work_place" class="form-control" placeholder="Dirección de trabajo"></textarea>
                            </div>
                            <div class="form-group form-actions">
                                <button type="submit" class="btn btn-sm btn-primary">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Datos Estudiante
                    </div>
                    <div class="card-block">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nombres" autofocus>
                            </div>
                            <div class="form-group">
                                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Apellidos">
                            </div>
                            <div class="form-group">
                                <input type="text" id="identification" name="identification" class="form-control" placeholder="Cédula">
                            </div>
                            <div class="form-group">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">Genero</option>
                                    <option value="Female">Femenino</option>
                                    <option value="Male">Masculino</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="date" id="birthdate" name="birthdate" class="form-control" placeholder="Fecha de nacimiento">
                            </div>
                            <div class="form-group">
                                <textarea id="diseases" name="diseases" class="form-control" placeholder="Enfermadedes"></textarea>
                            </div>
                            <div class="form-group">
                                <select name="grade_id" id="grade_id" class="form-control">
                                    <option value="">Grado</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="section_id" id="section_id" class="form-control">
                                    <option value="">Seccion</option>
                                </select>
                            </div>
                            <div class="form-group form-actions">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
