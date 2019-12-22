<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Equipos;
use App\User;

class EquiposTest extends TestCase
{
    /**
     * Pruebas Unitarias para el controlador de Equipos. Como este se basa en un resource route de laravel (API Request)
     * se estaran haciendo testings por medio de requests a los endpoints.
     * @return void
     */
    public function test_mostrar_todos_los_equipos()
    {
        //Desabilitando las exceptions para tener mas detalles de los errores que puedan ocurrir.
        $this->withoutExceptionHandling();

        //Se traen todos los equipos en la base de datos.
        $equipos = Equipos::all()->toArray();

        //Se hace un request al route que muestra todos los equipos y se le envia un arreglo con los equipos para que sean renderizados
        $this->get(route('equipos.index', 'equipos'))
        ->assertStatus(200); //Se espera un status response 200 por parte del server si los parametros de la ruta y los datos enviados son correctos.

        
    }

    public function test_mostrar_detalles_de_un_equipo()
    {
        //Desabilitando las exceptions para tener mas detalles de los errores que puedan ocurrir.
        $this->withoutExceptionHandling();

        //Se crea un test data de un equipo en la DB.
        $stub = factory(Equipos::class)->create(['id'=>20]);

        //Se evalua que el objeto/arreglo del nuevo equipo exista o tenga datos en el.
        $this->assertNotEmpty([$stub], 'el objeto del equipo no puede estar vacio');

        //Se hace un request al route show con el id del equipo que se quiere mostrar.
        $this->get(route('equipos.show',[$stub->id]))
        ->assertStatus(200); //Se espera un status response de 200 por parte del server si existe el equipo con el id que se esta enviando.
        
    }

    public function test_crear_un_equipo()
    {
        //Desabilitando las exceptions para tener mas detalles de los errores que puedan ocurrir.
        $this->withoutExceptionHandling();

        //Se instancia un Usuario con permisos en el sistema.
        $user = User::find(2);

        //Input del usuario que se enviara como request al route.
        $request = [ 
            'code' => 'BBB-001', 
            'nombre' => 'nuevo equipo test', 
            'availability' => (string)rand(0,1), 
            'sede' => (string)rand(1,8), 
            'persona' => '8-888-8888', 
            'descripcion' => 'nueva descripcion test'
        ];

        $this->actingAs($user) //Se valida que se esta haciendo un request con un usuario con permisos para modificar los datos del sistema.
        ->call('POST', 'equipos', $request) //Se hace el request al route store con los datos que se van a utilizar para crear un nuevo equipo.
        ->assertStatus(302); //Se espera un status response 302 por parte del server si se efectuo la eliminacion del equipo y luego se redirigio a otro route.        
    }

    public function test_modificar_un_equipo()
    {
        //Desabilitando las exceptions para tener mas detalles de los errores que puedan ocurrir.
        $this->withoutExceptionHandling();

        //Se instancia un Usuario con permisos en el sistema.
        $user = User::find(2);

        //Se crea un test data de un equipo en la DB.
        $stub = factory(Equipos::class)->create(['id'=>23]); //cambiar el id para realizar las pruebas

        //Input del usuario que se enviara como request al route. 
        $request = [ 
            'code' => $stub->code, 
            'nombre' => 'nombre modificado por el metodo update', 
            'availability' => $stub->availability, 
            'sede' => $stub->sede, 
            'persona' => $stub->persona, 
            'descripcion' => 'descripcion modificada por el metodo update'
        ];

        //Se evalua que el objeto/arreglo del nuevo equipo exista o tenga datos en el.
        $this->assertNotEmpty([$stub], 'el objeto del equipo no puede estar vacio');

        $this->actingAs($user) //Se valida que se esta haciendo un request con un usuario con permisos para modificar los datos del sistema.
        ->call('PATCH', 'equipos/'.$stub->id, $request) //Se hace el request al route update con el id del equipo que se quiere modificar y los datos que se van a cambiar.
        ->assertStatus(302); //Se espera un status response 302 por parte del server si se efectuo la eliminacion del equipo y luego se redirigio a otro route.        
    }

    public function test_eliminar_un_equipo()
    {
        //Desabilitando las exceptions para tener mas detalles de los errores que puedan ocurrir.
        $this->withoutExceptionHandling();

        //Se instancia un Usuario con permisos en el sistema.
        $user = User::find(2);

        //Se crea un test data de un equipo en la DB.
        $stub = factory(Equipos::class)->create(['id'=>25]);

        //Se evalua que el objeto/arreglo del nuevo equipo exista o tenga datos en el.
        $this->assertNotEmpty([$stub], 'el objeto del equipo no puede estar vacio');

        $this->actingAs($user) //Se valida que se esta haciendo un request con un usuario con permisos para modificar los datos del sistema.
        ->delete(route('equipos.destroy',[$stub->id])) //Se hace el request al route delete con el id del equipo que se quiere eliminar.
        ->assertStatus(302); //Se espera un status response 302 por parte del server si se efectuo la eliminacion del equipo y luego se redirigio a otro route.
        
    }
}
