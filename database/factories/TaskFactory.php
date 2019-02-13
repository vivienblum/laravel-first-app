<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'description' => $faker->text,
        'project_id' => function () {
            return factory(App\Project::class)->create()->id;
        }
    ];
});
