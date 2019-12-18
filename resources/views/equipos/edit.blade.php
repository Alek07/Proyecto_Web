@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col">

            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $errors)
                        <li>{{$errors}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{\Session::get('success')}}</p>
            </div>
            @endif

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h1 class="text-left">Editar Equipo</h1>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button onclick="location.href='{{action('HomeController@index')}}'" type="button" class="btn btn-secondary btn-lg">Regresar</button>
                        </div>
                    </div>
                </div>
                <hr>
                <br>
            
                <div class="card">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <form class="pt-3" method="post" action="{{action('EquipoController@update', $id)}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="PATCH">
                                
                                    <div class="form-group">
                                        <label for="equipoCodigo">Codigo</label>
                                        <input type="text" value="{{$equipos['code']}}" name="code" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="equipoNombre">Nombre</label>
                                    <input type="text" value="{{$equipos['nombre']}}" name="nombre" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="equipoAvailability">Disponibilidad</label>
                                        <select name="availability" id="availability" class="form-control">
                                            @if($equipos['availability'] == 1)
                                            <option selected value={{1}}>Si</option>
                                            <option value={{0}}>No</option>
                                            @else
                                            <option value={{1}}>Si</option>
                                            <option selected value={{0}}>No</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="equipoSede">Sede</label>
                                        <select name="sede" id="sede" class="form-control">
                                        <!--Problema al editar el campo de sede-->
                                        @foreach($sedeValues as $key => $val)
                                            @if($equipos['sede'] == $key)
                                                <option selected value="{{$key}}">{{$val}}</option>
                                            @else
                                                <option value="{{$key}}">{{$val}}</option>
                                            @endif
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="equipoPersona">Encargado</label>
                                    <input type="text" value="{{$equipos['persona']}}" name="persona" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="equipoDescripcion">Descripcion</label>
                                        <input type="text" value="{{$equipos['descripcion']}}" name="descripcion" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Guardar" class="btn btn-primary btn-lg">

                                        <button onclick="location.href='{{action('EquipoController@show', $equipos['id'])}}'"
                                        type="button" class="btn btn-secondary btn-lg">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection