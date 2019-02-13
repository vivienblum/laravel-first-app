<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
      'title' => $faker->title,
      'description' => str_random(20),
    ];
});
