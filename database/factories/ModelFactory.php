<?php

use Faker\Generator as Faker;

$factory->define(App\Entities\Professores::class, function (Faker $faker) {
    return [
        'nome' => $faker->name
    ];
});

$factory->define(App\Entities\Turmas::class, function (Faker $faker) {
    return [
        'nome' => $faker->randomElement($array = array('A', 'B', 'T')),
        'disciplinas_id' => $faker->numberBetween($min = 1, $max = 42),
        'professores_id' => $faker->numberBetween($min = 1, $max = 50),
        "semestres_id" => $faker->numberBetween($min = 1, $max = 20),
    ];
});