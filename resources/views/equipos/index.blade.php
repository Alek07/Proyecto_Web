@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-end">
            <button onclick="location.href='{{action('EquipoController@create')}}'" type="button" class="btn btn-primary btn-lg">Agregar Equipo</button>
        </div>
        @if($message = Session::get('success'))
        <div class="alert alert-success mt-3 alert-dismissible fade show">
            <p>{{$message}}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row">
            <div class="col">
            <h1 class="text-center">Equipos</h1>
            <hr>
            <br>
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Encargado</th>
                    <th scope="col">Ubicacion</th>
                    <th scope="col">Disponibilidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($equipos as $row)
                    <tr onclick="location.href='{{action('EquipoController@show', $row['id'])}}'">
                        <td>{{$row['nombre']}}</td>
                        <td>{{$row['code']}}</td>
                        <td>{{$row['persona']}}</td>
                        @foreach($sedeValues as $key => $val)
                            @if($row['sede'] == $key)
                                <td>{{$val}}</td>
                            @endif
                        @endforeach
                        @if($row['availability'] == 1)
                            <td>
                                <h4>
                                    <span class="badge badge-success">
                                        Disponible
                                    </span>
                                </h4>
                            </td>
                        @else
                            <td>
                                <h4>
                                    <span class="badge badge-danger">
                                        No Disponible
                                    </span>
                                </h4>
                            </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection