@extends('layouts.app')

@section('content')
<br>
<h1 class="text-center">Bienvenidos al Sistema de Control de Inventario</h1>
<hr>
<br>
<div class="container mt-5">
    <div class="row bg-primary p-4 rounded">
        <div class="col-md-4">
            <div class="card" style="cursor: pointer" onclick="location.href='{{action('EquipoController@index')}}'">
                <img src="/assets/img/equipos.jpg" class="card-img-top" alt="Equipos_Image">
                <div class="card-body">
                    <p class="card-text text-center h4 font-weight-bold">Equipos</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="cursor: pointer" onclick="location.href='{{action('ProfesoresController@index')}}'">
                <img src="/assets/img/work.jpg" class="card-img-top" alt="Encargados_Image">
                <div class="card-body">
                    <p class="card-text text-center h4 font-weight-bold">Profesores / Encargados</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="cursor: pointer" onclick="location.href='{{action('UbicacionesController@index')}}'">
                <img src="/assets/img/fachada_utp.jpg" class="card-img-top" alt="Sede_Image">
                <div class="card-body">
                    <p class="card-text text-center h4 font-weight-bold">Ubicaciones / Sedes</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
