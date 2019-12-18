<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfesoresController extends Controller
{
    /**
     * Controlador para la tabla personas
     */
    public function index()
    {
        //Inicializando variable para almacenar datos estraidos de la DB.
        $profesores = DB::table('personas')
        ->select('full_name', 'cedula')
        ->get();

        //Variable temporal para almacenar equipos filtrados.
        $equipos = [];

        //FIltro para obtener los equipos en relacion con una persona.
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
