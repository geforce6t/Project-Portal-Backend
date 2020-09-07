<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'roll_number' => $faker->unique()->numberBetween(100000000, 109999999),
        'name' => $faker->name,
        'email' => $faker->name.'@gmail.com',
        'password' => bcrypt($faker->firstName),
        'github_handle' => 'github.com/'.$faker->firstName
    ];
});
