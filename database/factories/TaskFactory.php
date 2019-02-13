<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'description' => str_random(20),
        'project_id' => function () {
            return factory(App\Project::class)->create()->id;
        }
    ];
});
