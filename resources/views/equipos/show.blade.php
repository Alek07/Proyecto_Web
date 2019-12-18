@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-end">
            <button onclick="location.href='{{url()->previous()}}'"
                    type="button" class="btn btn-secondary btn-lg">Regresar</button>
        </div>
        <div class="row mt-5">
            <div class="card">
                <div class="card-header bg-primary">
                    <h1 class="display-4 text-left text-white">{{$equipos['nombre']}}</h1>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row mt-5">
                            <div class="col">
                                <div class="container">
                                    <div class="row">
                                        <div class="col"><h3 class="font-weight-bold">Codigo:</h3></div>
                                        <div class="col"><h3>{{$equipos['code']}}</h3></div>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col"><h3 class="font-weight-bold">Sede:</h3></div>
                                        <div class="col">
                                        @foreach($sedeValues as $key => $val)
                                            @if($equipos['sede'] == $key)
                                            <h3>{{$val}}</h3>
                                            @endif
                                        @endforeach
                                        </div>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col"><h3 class="font-weight-bold">Encargado:</h3></div>
                                        <div class="col"><h3>{{$equipos['persona']}}</h3></div>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col-12"><h3 class="font-weight-bold">Descripcion:</h3></div>
                                        <div class="col pt-2"> <h3>{{$equipos['descripcion']}}</h3></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <img src="/assets/img/equipos.jpg" alt="">
                            </div>
                        </div>
                        @auth
                            <div class="row justify-content-center mt-5">
                                <div onclick="location.href='{{action('EquipoController@edit', $equipos['id'])}}'" class="btn btn-primary btn-lg">Editar</div>
                                <div class="pl-3">
                                    <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#exampleModal">Eliminar</button>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Eliminar Equipo</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>¿Esta seguro que desea eliminar este equipo?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <form class="pl-2" action="{{action('EquipoController@destroy', $equipos['id'])}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection