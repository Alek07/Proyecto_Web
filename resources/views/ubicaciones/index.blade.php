@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-end">
            <button onclick="location.href='{{action('HomeController@index')}}'" type="button" class="btn btn-secondary btn-lg">Regresar</button>
        </div>
        <h1 class="text-center mt-3">Ubicaciones</h1>
        <hr>
        <br>
        <div class="accordion" id="accordionExample">
            <div class="card">
                @foreach($data as $sedes => $val)
                    <div class="card-header" style="cursor: pointer" id="headingOne">
                        <h1 class="mb-0">
                        @foreach($sedeValues as $key => $value)
                            @if($sedes == $key)
                                <div data-toggle="collapse" data-target="{{$target = str_replace(' ', '', '#'.$value)}}" aria-expanded="true" aria-controls="collapseOne">
                                    <h3>{{{'Centro Regional de '.$value}}}</h3>
                                </div>
                            @endif
                        @endforeach
                        </h1>
                    </div>
                    @foreach($val as $sede)
                        @foreach($sedeValues as $key => $value)
                            @if($sedes == $key)
                                <div id="{{$idTarget = str_replace(' ', '', $value)}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            @endif
                        @endforeach
                                <div class="card-body">
                                    <table class="table table-hover shadow p-3 mb-5 bg-white">
                                        <tbody>
                                            @foreach($sede as $info)
                                                <tr onclick="location.href='{{action('EquipoController@show', $info->id)}}'" style="cursor: pointer">
                                                    <td class="h4">{{$info->nombre}}</td>
                                                    <td class="h4">{{$info->code}}</td>
                                                    <td class="h4">{{$info->persona}}</td>
                                                    @if($info->availability == 1)
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
                    @endforeach
                @endforeach    
            </div>
        </div>
    </div>
@endsection