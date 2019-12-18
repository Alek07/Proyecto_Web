<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UbicacionesController extends Controller
{
    public function index()
    {
        //Variable temporal para almacenar equipos filtrados.
        $data = [
            "1" => [],
            "2" => [],
            "3" => [],
            "4" => [],
            "5" => [],
            "6" => [],
            "7" => [],
            "8" => [],
        ];

        //Arreglo auxiliar para control de los nombres de las sedes.
        $sedeValues = [
            "1" => "Azuero",
            "2" => "Bocas del Toro",
            "3" => "Chiriquí",
            "4" => "Coclé",
            "5" => "Colón",
            "6" => "Panamá",
            "7" => "Panamá Oeste",
            "8" => "Veraguas",
        ];

        //FIltro para obtener los equipos en relacion con una persona.
        foreach($data as $key => $val){
            $temp =  DB::table('equipos')
            ->join('sedes', 'sedes.id', 'equipos.sede')
            ->select('equipos.*', 'sedes.sede as sede_nombre')
            ->where('equipos.sede', '=', $key)
            ->get();

            if($temp){
                array_push($data[$key], $temp);
            }
        }
        
        // return $data;
        return view('ubicaciones.index', compact('data', 'sedeValues'));
    }
}
