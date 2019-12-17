@extends('layouts.app')

@section('content')
<br>
<h1 class="text-center">Bienvenidos al Sistema de Control de Inventario!</h1>
<hr>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card" onclick="location.href='{{action('EquipoController@index')}}'">
                <img src="/assets/img/equipos.jpg" class="card-img-top" alt="Equipos_Image">
                <div class="card-body">
                    <p class="card-text">Equipos</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" onclick="location.href=''">
                <img src="/assets/img/encargado.jpg" class="card-img-top" alt="Encargados_Image">
                <div class="card-body">
                    <p class="card-text">Profesores / Encargados</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" onclick="location.href='{{action('UbicacionesController@index')}}'">
                <img src="/assets/img/fachada_utp.jpg" class="card-img-top" alt="Sede_Image">
                <div class="card-body">
                    <p class="card-text">Ubicaciones / Sedes</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div> -->
