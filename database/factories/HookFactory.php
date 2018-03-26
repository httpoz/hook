<?php
    
    use Faker\Generator as Faker;
    
    $factory->define(HttpOz\Hook\Models\Hook::class, function (Faker $faker) {
        return [
            'name'        => $faker->words,
            'description' => $faker->sentence,
            'is_active'   => $faker->boolean
        ];
    });
