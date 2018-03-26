<?php

use Faker\Generator as Faker;

$factory->define(HttpOz\Hook\Models\Hook::class, function (Faker $faker) {
    return [
        'is_active' => $faker->boolean
    ];
});
