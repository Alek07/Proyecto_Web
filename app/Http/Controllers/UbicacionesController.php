<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UbicacionesController extends Controller
{
    public function index()
    {
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
