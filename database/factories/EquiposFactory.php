<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Equipos;
use Faker\Generator as Faker;

$factory->define(Equipos::class, function (Faker $faker) {
    return [
        'code' => 'AAA-000', 
        'nombre' => $faker->name, 
        'availability' => (string)rand(0,1), 
        'sede' => (string)rand(1,8), 
        'persona' => '8-888-8888', 
        'descripcion' => 'test description'
    ];
});
