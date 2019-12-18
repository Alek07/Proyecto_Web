<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfesoresController extends Controller
{
    public function index()
    {
        $profesores = DB::table('personas')
        ->select('full_name', 'cedula')
        ->get();

        $equipos = [];

        foreach($profesores as $persona){
            $temp =  DB::table('equipos')
            ->join('personas', 'personas.cedula', 'equipos.persona')
            ->join('sedes', 'sedes.id', 'equipos.sede')
            ->select('equipos.*', 'sedes.sede as sede_nombre')
            ->where('equipos.persona', '=', $persona->cedula)
            ->get();

            if($temp){
                array_push($equipos, $temp);
            }
        }

        // return $equipos;
        return view('profesores.index', compact('profesores', 'equipos'));
    }
}
