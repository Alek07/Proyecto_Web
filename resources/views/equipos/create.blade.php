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

                <h1 class="text-left">Agregar Equipo</h1>
                <hr>
                <br>
            
                <form method="post" action="{{url('equipos')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="equipoCodigo">Codigo</label>
                        <input type="text" name="code" class="form-control" placeholder="Codigo">
                    </div>
                    <div class="form-group">
                        <label for="equipoNombre">Nombre</label>
                       <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="equipoAvailability">Disponibilidad</label>
                        <select name="availability" id="availability" class="form-control">
                            <option value={{1}}>Si</option>
                            <option value={{0}}>No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="equipoSede">Sede</label>
                        <select name="sede" id="sede" class="form-control">
                            <option value={{1}}>Azuero</option>
                            <option value={{2}}>Bocas del Toro</option>
                            <option value={{3}}>Chiriquí</option>
                            <option value={{4}}>Coclé</option>
                            <option value={{5}}>Colón</option>
                            <option value={{6}}>Panamá</option>
                            <option value={{7}}>Panamá Oeste</option>
                            <option value={{8}}>Veraguas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="equipoPersona">Encargado</label>
                       <input type="text" name="persona" class="form-control" placeholder="Persona">
                    </div>
                    <div class="form-group">
                        <label for="equipoDescripcion">Descripcion</label>
                       <input type="text" name="descripcion" class="form-control" placeholder="Descripcion">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Agregar" class="btn btn-primary btn-lg">

                        <button onclick="location.href='{{action('EquipoController@index')}}'"
                        type="button" class="btn btn-secondary btn-lg">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection