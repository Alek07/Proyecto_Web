<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Equipos;

use App\Http\Middleware\Authenticate;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    
    public function index()
    {
        $equipos = Equipos::paginate(8);

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
        
        return view('equipos.index', compact('equipos', 'sedeValues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required', 
            'nombre' => 'required', 
            'availability' => 'required', 
            'sede' => 'required', 
            'persona' => 'required', 
            'descripcion' => 'required'
        ]);

        $equipo = new Equipos([
            'code' => $request->get('code'), 
            'nombre' => $request->get('nombre'), 
            'availability' => $request->get('availability'), 
            'sede' => $request->get('sede'), 
            'persona' => $request->get('persona'), 
            'descripcion' => $request->get('descripcion')
        ]);

        $equipo->save();

        return redirect()->route('equipos.create')->with('success', 'Equipo Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipos = Equipos::find($id);

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

        return view('equipos.show', compact('equipos', 'id', 'sedeValues'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipos = Equipos::find($id);

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

        return view('equipos.edit', compact('equipos', 'id', 'sedeValues'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validacion de los campos de la vista editar.
        $this->validate($request, [
            'code' => 'required', 
            'nombre' => 'required', 
            'availability' => 'required', 
            'sede' => 'required', 
            'persona' => 'required', 
            'descripcion' => 'required'
        ]);

        $equipo = Equipos::find($id);

        //Asignacion de nuevos valores a las variables de la tabla equipos.
        $equipo->code = $request->get('code');
        $equipo->nombre = $request->get('nombre');
        $equipo->availability = $request->get('availability');
        $equipo->sede = $request->get('sede');
        $equipo->persona = $request->get('persona');
        $equipo->descripcion = $request->get('descripcion');

        //Guardar cambios.
        $equipo->save();
        return redirect()->route('equipos.index')->with('success', 'Equipo Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipo = Equipos::find($id);

        //Metodo para eliminar un registro.
        $equipo->delete();

        return redirect()->route('equipos.index')->with('success', 'Equipo Eliminado');
    }
}
