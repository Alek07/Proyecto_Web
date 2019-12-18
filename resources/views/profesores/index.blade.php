@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-end">
            <button onclick="location.href='{{action('HomeController@index')}}'" type="button" class="btn btn-secondary btn-lg">Regresar</button>
        </div>
        <h1 class="text-center mt-3">Profesores / Encargados</h1>
        <hr>
        <br>
        <div class="accordion" id="accordionExample">
            <div class="card">
                @foreach($profesores as $pfKey => $profesor)
                    <div class="card-header" style="cursor: pointer" id="headingOne">
                        <h1 class="mb-0">
                            <div data-toggle="collapse" data-target="{{$target = str_replace(' ', '', '#'.$profesor->full_name)}}" aria-expanded="true" aria-controls="collapseOne">
                                <div class="row">
                                    <div class="col">
                                        {{$profesor->full_name}}
                                    </div>
                                    <div class="col">
                                        {{$profesor->cedula}}
                                    </div>
                                </div>
                            </div>
                        </h1>
                    </div>
                    <div id="{{$idTarget = str_replace(' ', '', $profesor->full_name)}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <table class="table table-hover">
                                <tbody>
                                @foreach($equipos as $eqKey => $data)
                                    @if($eqKey == $pfKey)
                                        @foreach($data as $equipo)
                                            <tr onclick="location.href='{{action('EquipoController@show', $equipo->id)}}'">
                                                <td>{{$equipo->nombre}}</td>
                                                <td>{{$equipo->code}}</td>
                                                <td>{{$equipo->sede_nombre}}</td>
                                                @if($equipo->availability == 1)
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
                                    @endif
                                @endforeach
                                </tbody>
                            </table>     
                        </div>
                    </div>
                </div> 
                @endforeach    
            </div>
        </div>
    </div>
@endsection