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
                    <div class="card-header" id="headingOne">
                        <h1 class="mb-0">
                        @foreach($sedeValues as $key => $value)
                            @if($sedes == $key)
                                <div data-toggle="collapse" data-target="{{$target = str_replace(' ', '', '#'.$value)}}" aria-expanded="true" aria-controls="collapseOne">
                                    {{{'Centro Regional de '.$value}}}
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
                                    <table class="table table-hover">
                                        <tbody>
                                            @foreach($sede as $info)
                                                <tr onclick="location.href='{{action('EquipoController@show', $info->id)}}'">
                                                    <td>{{$info->nombre}}</td>
                                                    <td>{{$info->code}}</td>
                                                    <td>{{$info->persona}}</td>
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