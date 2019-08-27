<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(\App\Task::class, function (Faker $faker) {
    return [
        'owner_id' => User::all()->random(1)->first()->id,
        'assignee_id' => User::all()->random(1)->first()->id,
        'title' => $faker->word,
        'description' => $faker->words(10, true),
        'priority' => rand(0, 5),
        'completed_at' => rand(0, 1) ? today()->subSeconds(rand(60, 86400 * 30)) : null,
    ];
});
